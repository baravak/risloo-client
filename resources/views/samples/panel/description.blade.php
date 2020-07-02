<div data-panel="description" class="mb-5">
    <div class="card-title" >{{$sample->scale->title}} <sup><small>{{$sample->edition}}</small></sup></div>
    <div>
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
</div>
