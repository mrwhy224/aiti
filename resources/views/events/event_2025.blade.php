<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ششمین نمایشگاه تخصصی صنعت نساجی ۲۰۲۵</title>
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'brand-primary': '#074172', // رنگ اصلی شما
                        'brand-secondary': '#e9d8a6', 
                        'brand-accent': '#50808e', 
                    }
                }
            }
        }
    </script>
    
    <!-- Font Awesome (برای آیکون‌ها) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    
    <!-- فونت وزیرمتن (هماهنگ با پوستر) -->
    <link href="https://fonts.googleapis.com/css2?family=Vazirmatn:wght@400;700;800;900&display=swap" rel="stylesheet">
    
    <style>
        body {
            font-family: 'Vazirmatn', sans-serif;
            background-image: url('01.jpeg');
            background-size: cover;
            background-position: center;
            background-attachment: fixed; 
        }

        /* لایه گرادینت همرنگ با پوستر */
        .gradient-overlay {
            background: linear-gradient(180deg, rgba(251, 192, 45, 0.6) 0%, rgba(74, 44, 123, 0.8) 100%);
        }
        
        /* --- استایل اسکرول‌بار سفارشی (تم روشن) --- */
        .custom-scrollbar::-webkit-scrollbar {
            width: 8px;
        }
        .custom-scrollbar::-webkit-scrollbar-track {
            background: rgba(0, 0, 0, 0.05); /* پس زمینه خاکستری روشن */
            border-radius: 10px;
        }
        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: rgba(0, 0, 0, 0.3); /* رنگ اسکرولر خاکستری تیره */
            border-radius: 10px;
            border: 1px solid rgba(255, 255, 255, 0.8);
        }
        .custom-scrollbar::-webkit-scrollbar-thumb:hover {
            background: rgba(0, 0, 0, 0.5);
        }
        
        .custom-scrollbar {
            scrollbar-width: thin;
            scrollbar-color: rgba(0, 0, 0, 0.3) rgba(0, 0, 0, 0.05);
        }
    </style>
</head>
<body class="antialiased min-h-screen">

    <!-- لایه پوشاننده گرادینت و محتوا -->
    <div class="gradient-overlay relative min-h-screen w-full flex items-center justify-center p-6 overflow-y-auto">

        <!-- لینک بازگشت به خانه (اصلاح شد برای خوانایی) -->
        <a href="/" class="absolute top-6 right-6 md:top-8 md:right-8 text-brand-primary text-sm font-semibold py-2 px-4 bg-white/50 border border-white/30 rounded-lg backdrop-blur-md transition-all hover:bg-white/80 hover:shadow-lg z-20">
            <i class="fas fa-home ml-2"></i>
            <span>بازگشت به خانه</span>
        </a>

        <!-- 
          کارت شیشه‌ای اصلی برای محتوا
          تغییر: bg-white/10 به bg-white/95 (سفید مات)
        -->
        <div class="w-full max-w-4xl bg-white/95 backdrop-blur-lg border border-white/30 rounded-2xl shadow-2xl overflow-hidden max-h-[90vh] overflow-y-auto custom-scrollbar">
            
            <!-- بخش بالایی کارت (اطلاعات اصلی) -->
            <div class="p-8 md:p-12 text-center text-gray-900">
                
                <!-- عنوان اصلی (اصلاح شد) -->
                <h1 class="text-3xl md:text-5xl font-black leading-tight text-brand-primary">
                    ششمین نمایشگاه تخصصی صنعت نساجی
                </h1>
                
                <!-- عنوان انگلیسی (اصلاح شد) -->
                <h2 class="text-2xl md:text-4xl font-bold text-gray-700 opacity-90 mt-2">
                    TEXTILE INDUSTRY 2025
                </h2>
                
                <!-- زیرعنوان (اصلاح شد) -->
                <p class="text-xl md:text-2xl font-medium text-yellow-600 mt-3">
                    پوشاک و منسوجات خانگی
                </p>
                <img src="/images/banner/01.jpeg" style="max-width:70%;border-radius: 10px; margin: 40px auto;">

                <!-- جداکننده (اصلاح شد) -->
                <div class="w-1/3 my-6 md:my-8 mx-auto border-t-2 border-gray-200 rounded-full"></div>

                                <!-- اطلاعات رویداد (تاریخ، ساعت، مکان) (اصلاح شد) -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 md:gap-8 text-lg">
                    
                    <!-- تاریخ -->
                    <div class="bg-blue-50/50 p-4 rounded-lg border border-gray-200 transition-all hover:bg-blue-50 hover:shadow-md">
                        <i class="fas fa-calendar-alt text-2xl text-brand-primary mb-2"></i>
                        <h3 class="font-bold text-xl mb-1 text-brand-primary">تاریخ برگزاری</h3>
                        <p class="font-medium text-gray-800">۲۰ لغایت ۲۳ آذر ۱۴۰۴</p>
                    </div>
                    
                    <!-- ساعت -->
                    <div class="bg-blue-50/50 p-4 rounded-lg border border-gray-200 transition-all hover:bg-blue-50 hover:shadow-md">
                        <i class="fas fa-clock text-2xl text-brand-primary mb-2"></i>
                        <h3 class="font-bold text-xl mb-1 text-brand-primary">ساعت بازدید</h3>
                        <p class="font-medium text-gray-800">۱۶:۰۰ الی ۲۱:۰۰</p>
                    </div>
                    
                    <!-- مکان -->
                    <div class="bg-blue-50/50 p-4 rounded-lg border border-gray-200 transition-all hover:bg-blue-50 hover:shadow-md">
                        <i class="fas fa-map-marker-alt text-2xl text-brand-primary mb-2"></i>
                        <h3 class="font-bold text-xl mb-1 text-brand-primary">محل برگزاری</h3>
                        <p class="font-medium text-gray-800">نمایشگاه بین‌المللی مشهد</p>
                    </div>
                </div>
            </div>

            <!-- بخش محتوای اضافه شده (اصلاح شد) -->
            <div class="px-8 md:px-12 py-8 text-gray-800 border-t border-gray-200">
                
                <!-- درباره نمایشگاه -->
                <h3 class="text-2xl font-bold mb-4 text-center text-brand-primary">درباره نمایشگاه</h3>
                <p class="text-base leading-relaxed mb-4 text-gray-700">
                    ششمین دوره نمایشگاه تخصصی صنعت نساجی، پوشاک و منسوجات خانگی مشهد (TEXTILE INDUSTRY 2025)، فرصتی بی‌نظیر برای فعالان، تولیدکنندگان و نوآوران این صنعت است تا آخرین دستاوردها، تکنولوژی‌ها و خدمات خود را به نمایش بگذارند.
                </p>
                <p class="text-base leading-relaxed text-gray-700">
                    این رویداد به عنوان یک پل ارتباطی کلیدی، زمینه را برای شبکه‌سازی، ایجاد فرصت‌های تجاری جدید و آشنایی با روندهای آینده بازار فراهم می‌آورد. از ماشین‌آلات پیشرفته نساجی گرفته تا طراحی‌های نوین پوشاک و منسوجات خانگی، همگی در این گردهمایی بزرگ صنعتی حضور خواهند داشت.
                </p>

                <!-- ویژگی‌های کلیدی -->
                <h4 class="text-xl font-bold mb-4 mt-8 text-center text-brand-primary">آنچه در انتظار شماست</h4>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 text-lg">
                    <!-- کارت ۱ -->
                    <div class="bg-blue-50/50 p-4 rounded-lg border border-gray-200 text-center">
                        <i class="fas fa-rocket text-2xl text-brand-primary mb-2"></i>
                        <h3 class="font-bold text-lg text-brand-primary">پاویون نوآوری</h3>
                        <p class="text-sm text-gray-700">معرفی استارتاپ‌ها و تکنولوژی‌های جدید</p>
                    </div>
                    <!-- کارت ۲ -->
                    <div class="bg-blue-50/50 p-4 rounded-lg border border-gray-200 text-center">
                        <i class="fas fa-handshake text-2xl text-brand-primary mb-2"></i>
                        <h3 class="font-bold text-lg text-brand-primary">نشست‌های B2B</h3>
                        <p class="text-sm text-gray-700">جلسات تجاری هدفمند با تولیدکنندگان</p>
                    </div>
                    <!-- کارت ۳ -->
                    <div class="bg-blue-50/50 p-4 rounded-lg border border-gray-200 text-center">
                        <i class="fas fa-chalkboard-teacher text-2xl text-brand-primary mb-2"></i>
                        <h3 class="font-bold text-lg text-brand-primary">کارگاه‌های تخصصی</h3>
                        <p class="text-sm text-gray-700">آموزش روندهای نوین در طراحی و تولید</p>
                    </div>
                </div>
            </div>
            
            <!-- بخش پایینی کارت (اطلاعات تماس و QR) (اصلاح شد) -->
            <div class="bg-gray-100 px-8 py-6 border-t border-gray-200 flex flex-col md:flex-row justify-between items-center gap-4 sticky bottom-0">
                
                <!-- اطلاعات تماس -->
                <div class="text-center md:text-right text-gray-700">
                    <p class="font-bold text-lg text-brand-primary">ستاد برگزاری:</p>
                    <div class="flex flex-col md:flex-row gap-x-4 font-medium text-lg text-gray-800">
                        <span>۰۹۳۳۳۸۸۳۹۵۱۰</span>
                        <span>۰۲۱۹۱۰۱۸۳۰۷</span>
                    </div>
                </div>

                <!-- QR Code (نمونه) -->
                <div class="text-center text-gray-700">
                    <!-- شما باید تصویر QR Code واقعی را اینجا قرار دهید -->
                    <img src="https://placehold.co/100x100/333333/ffffff?text=QR+Code" alt="QR Code" class="w-20 h-20 md:w-24 md:h-24 rounded-lg border-2 border-gray-300 shadow-lg mx-auto">
                    <p class="text-xs font-medium opacity-80 mt-2">اسکن جهت اطلاعات بیشتر</p>
                </div>
            </div>
        </div>
    </div>

</body>
</html>