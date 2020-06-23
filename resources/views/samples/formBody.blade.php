<div class="container mt-md-5">
    <div class="card test-card shadow-sm mb-3">
        <div class="card-body">
            <div class="card-title" id="title">{{$sample->scale}} <sup><small>{{$sample->edition}}</small></sup></div>
            <div class="mb-5" id="description">
                @markdown($sample->description)
                <h4>
                    برای سهولت در اجرای تست شما می‌توانید:
                </h4>
                <ul>
                    <li>به جای کلیک بر روی گزینه‌ها از کلید‌های <kbd>1</kbd> تا <kbd>9</kbd> استفاده کنید</li>
                    <li>برای رفتن به تست بعدی از کلید‌ <kbd>←</kbd> یا <kbd>Enter</kbd> یا <kbd>ESC</kbd> استفاده کنید</li>
                    <li>برای رفتن به تست قبلی از کلید‌ <kbd>→</kbd> استفاده کنید</li>
                </ul>
            </div>
            <div class="mb-5" style="display: none" id="close">
                <p>
                اگر از اتمام تست مطمئن هستید و به تمامی گزینه‌ها پاسخ داده‌اید می‌توانید دکمه پایان را بزنید. بعد از زدن این دکمه، دیگر قادر به ویرایش تست نمی‌باشید
                </p>
                <div id="empty_list">

                </div>
                <div id="close-btn" class="d-none">
                    <p>
                    اگر با خطا مواجه شدید، بر روی دریافت تست بزنید و فایل دریافتی را به روان‌شناس یا اپراتور مرکزمشاوره تحویل دهید
                    </p>
                    <a href="{!! urldecode(route('samples.close', substr($sample->id, 1)))!!}" data-method="POST" data-lijax class="btn btn-primary">اتمام تست</a>
                    <a id="download-close" href="#" class="btn btn-secondary">دریافت فایل تست</a>
                </div>
            </div>

            <div id="item" class="mb-5" style="display: none"></div>
            <div id="template" style="display: none">
                <div class="radio">
                    <input type="radio">
                    <label>
                        <span></span>
                    </label>
                </div>
            </div>

            <div class="progress test-progress mb-3">
                <div id="progress" class="progress-bar" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
            </div>

            <div class="d-flex justify-content-between align-items-baseline">
                <div class="d-flex align-items-center">
                    <span class="font-weight-bold" id="nav-count"></span>
                    <span class="px-1">از</span>
                    <span class="font-weight-bold">{{count($sample->items)}}</span>
                </div>

                <div>
                    <span class="text-color-2 ml-2 fs-10" id="sync_status" title="وضعیت ذخیره‌سازی روی سرور">بدون تغییر</span>
                    <a class="btn btn-sm btn-light disabled direct" style="min-width: 50px;" id="nav-prev">
                        <i class="far fa-chevron-right align-middle"></i>
                    </a>
                    <a href="#1" class="btn btn-sm btn-light direct" style="min-width: 50px;" id="nav-next">
                        <i class="far fa-chevron-left align-middle"></i>
                    </a>
                    <div>
                        <label class="fs-10">
                            <input type="checkbox" id="skip"> پرش روی تست‌های خالی
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="alert alert-info d-none" role="alert" id="sync_alert">
        ارتباط شما با سرور قطع شده است!
        <ul>
            <li>شما می‌توانید بدون مشکل به کار خود ادامه دهید</li>
            <li>سیستم به صورت خودکار این ارتباط را چک می‌کند و در صورت اتصال گزینه‌های پاسخ‌داده شده را ذخیره می‌کند</li>
            <li>
                اگر تا انتهای نمونه‌گیری ارتباط شما برقرار نشد طبق مراحل زیر عمل کنید
                <ol>
                    <li>
                        بر روی <a href="#" class="btn btn-sm btn-info fs-10 direct" id="download">دریافت فایل تست</a> کلیک کنید
                    </li>
                    <li>
                        فایل دانلودی را پیش خود نگه‌داری کنید
                    </li>
                    <li>
                        فایل را به صورت دستی به روان‌شناس یا اپراتور مرکز مشاوره تحویل داده یا مستقما در پنل کاربری خود بارگزاری کنید
                    </li>
                </ol>
            </li>
        </ul>
    </div>
</div>


