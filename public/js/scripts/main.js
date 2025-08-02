async function loadAndBlockSection(selector, endpoint, onSuccess, options={}, backgroundColor='#fff') {
    const section = $(selector);
    if (!section.length) return;

    section.block({
        message: '<div class="spinner-border text-primary" role="status"></div>',
        css: { backgroundColor: 'transparent', border: '0' },
        overlayCSS: { backgroundColor: backgroundColor, opacity: 1 }
    });

    try {
        const json = await DataService.getData(endpoint, options);
        if (onSuccess) {
            onSuccess(json);
        }
    } catch (error) {
        toastr['error'](error.message, 'Load Failed');
    } finally {
        section.unblock();
    }
}

const DataService = {
  _cache: {},
  getData: async function(endpoint, options = {}) {
    const method = options.method || 'GET';
    const bodyString = options.body ? JSON.stringify(options.body) : '';
    const cacheKey = `${method}::${endpoint}::${bodyString}`;
    if (this._cache[cacheKey]) {
      return this._cache[cacheKey];
    }
    try {
      const fetchOptions = {
        method: method,
        ...(options.body && { body: bodyString })
      };
      const response = await AuthService.fetch(endpoint, fetchOptions);
      if (!response.ok) {
        const errorResult = await response.json();
        throw new Error(errorResult.message || `Request failed for ${endpoint}`);
      }
      
      const data = await response.json();
      this._cache[cacheKey] = data;
      return data;
    } catch (error) {
      console.error(`Failed to fetch data for ${cacheKey}:`, error);
    }
  },
  clearCache: function(endpoint, options = {}) {
    const method = options.method || 'GET';
    const bodyString = options.body ? JSON.stringify(options.body) : '';
    const cacheKey = `${method}::${endpoint}::${bodyString}`;

    if (this._cache[cacheKey]) {
      delete this._cache[cacheKey];
    }
  }
};

const AppConfig = {
  /**
   * The base URL for your Laravel API backend.
   * @type {string}
   */
  API_ENDPOINT: 'http://127.0.0.1:8000/api/v1',

  /**
   * The key used to store the authentication token in localStorage.
   * @type {string}
   */
  TOKEN_KEY: 'token',

  /**
   * The default page to redirect to after a successful login if no other
   * page was intended.
   * @type {string}
   */
  DEFAULT_REDIRECT_URL: '/',

  /**
   * The URL of the login page.
   * @type {string}
   */
  LOGIN_URL: '/login',
};

const AuthService = {
  // --- STATE & HELPERS ---

  /**
   * Checks if the user is authenticated.
   * @returns {boolean} - True if a token exists, false otherwise.
   */
  isAuthenticated: function() {
    return localStorage.getItem(AppConfig.TOKEN_KEY) !== null;
  },

  /**
   * Retrieves the stored authentication token.
   * @returns {string|null} - The token string or null if it doesn't exist.
   */
  getToken: function() {
    return localStorage.getItem(AppConfig.TOKEN_KEY);
  },


  // --- CORE LOGIC ---

  /**
   * A wrapper for the native fetch API that automatically adds the
   * Authorization header and handles 401 Unauthorized errors by logging the user out.
   * @param {string} endpoint - The API endpoint path (e.g., '/user').
   * @param {object} options - The native fetch options object (e.g., method, body).
   * @returns {Promise<Response>} - The fetch Response object.
   */
  fetch: async function(endpoint, options = {}) {
    const token = this.getToken();

    // Prepare the headers
    const headers = {
      'Content-Type': 'application/json',
      'Accept': 'application/json',
      ...options.headers, // Allow overriding default headers
    };

    if (token) {
      headers['Authorization'] = `Bearer ${token}`;
    }

    const fetchOptions = {
      ...options,
      headers: headers,
    };

    // Make the actual API call
    const response = await window.fetch(`${AppConfig.API_ENDPOINT}${endpoint}`, fetchOptions);

    // Check for authentication errors
    if (response.status === 401) {
      localStorage.removeItem(AppConfig.TOKEN_KEY);
      window.location.href = AppConfig.LOGIN_URL;
      throw new Error('Authentication failed. Redirecting to login.');
    }

    return response;
  },

  /**
   * Protects a page from unauthenticated access.
   * This function should be called at the top of any protected HTML page.
   */
  protectPage: function() {
    if (!this.isAuthenticated()) {
      // Save the current page path so we can redirect back after login
      localStorage.setItem('intended_url', window.location.pathname);
      // Redirect to the login page
      window.location.href = AppConfig.LOGIN_URL;
    }
  },

  /**
   * Handles the login process.
   * @param {string} email - The user's email.
   * @param {string} password - The user's password.
   * @returns {Promise<object>} - A promise that resolves with the API response.
   */
  login: async function(email, password) {
    // We use the new fetch wrapper here for consistency, though it's not strictly necessary for the login call itself.
    const response = await this.fetch('/auth/get_token', {
      method: 'POST',
      body: JSON.stringify({ email, password }),
    });

    const result = await response.json();

    if (!response.ok) {
        throw new Error(result.message || 'Login failed.');
    }

    // // Save the token on successful login
    // localStorage.setItem(AppConfig.TOKEN_KEY, result.token);

    // // Handle redirection
    // const intendedUrl = localStorage.getItem('intended_url');
    // localStorage.removeItem('intended_url'); // Clean up
    // window.location.href = intendedUrl || AppConfig.DEFAULT_REDIRECT_URL;
    
    return result;
  },

  /**
   * Logs the user out by clearing the token and redirecting.
   */
  logout: async function() {
    await this.fetch('/auth/destroy', { method: 'POST' });
    localStorage.removeItem(AppConfig.TOKEN_KEY);
    window.location.href = AppConfig.LOGIN_URL;
  }
};