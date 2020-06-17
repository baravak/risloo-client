<div class="container">
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
                <div class="d-flex">
                    <span class="font-weight-bold" id="nav-count">0</span>
                    <span class="px-1">از</span>
                    <span class="font-weight-bold">{{count($sample->items)}}</span>
                </div>

                <div>
                    <span class="text-color-2 ml-2 fs-14">بدون تغییر</span>
                    <a class="btn btn-sm btn-light disabled direct" style="min-width: 50px;" id="nav-prev">
                        <i class="far fa-chevron-right align-middle"></i>
                    </a>
                    <a href="#1" class="btn btn-sm btn-light direct" style="min-width: 50px;" id="nav-next">
                        <i class="far fa-chevron-left align-middle"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="alert alert-warning" role="alert">
        در صورت قطع ارتباط با سرور می‌توانید تست را تا آخر ادامه داده و نتیجه را ذخیره کنید.
        <a href="#" class="btn btn-sm btn-warning">دریافت فایل تست</a>
    </div>
</div>


