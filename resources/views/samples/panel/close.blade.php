<div data-panel="close" style="display: none"class="mb-5">
    <div class="card-title" >پایان نمونه‌گیری</div>
    <div id="close">
        <p>
        اگر از اتمام تست مطمئن هستید و به تمامی گزینه‌ها پاسخ داده‌اید می‌توانید دکمه پایان را بزنید. بعد از زدن این دکمه، دیگر قادر به ویرایش تست نمی‌باشید
        </p>
        <div id="empty_list">

        </div>
        <div id="close-btn">
            <p>
            اگر با خطا مواجه شدید، بر روی دریافت تست بزنید و فایل دریافتی را به روان‌شناس یا اپراتور مرکزمشاوره تحویل دهید
            </p>
            <a href="{!! urldecode(route('samples.close', substr($sample->id, 1)))!!}" data-method="POST" data-lijax class="btn btn-primary">اتمام تست</a>
            <a id="download-close" href="#" class="btn btn-secondary">دریافت فایل تست</a>
        </div>
    </div>
</div>
