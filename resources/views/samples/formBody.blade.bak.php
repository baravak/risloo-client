<div class="container mt-md-5">
    <div class="card test-card shadow-sm mb-3">
        <div class="card-body">
            @include('samples.panel.description')
            @includeWhen($sample->prerequisites, 'samples.panel.information')
            @include('samples.panel.items')
            @include('samples.panel.close')

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
                    <div class="custom-control custom-checkbox mt-3">
                        <input type="checkbox" class="custom-control-input" id="skip">
                        <label class="custom-control-label fs-10 align-middle" for="skip">
                            <span style="display: inline-block; margin-top: 5px;">پرش روی تست‌های خالی</span>
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


