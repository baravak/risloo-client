<div data-panel="close" style="display: none"class="mb-5">
    <div class="card-title" >پایان نمونه‌گیری</div>
    <div id="close">
        <p>
        اگر از اتمام نمونه مطمئن هستید و به تمامی گزینه‌ها پاسخ داده‌اید می‌توانید دکمه اتمام نمونه را بزنید. بعد از زدن این دکمه، دیگر قادر به ویرایش نمونه نمی‌باشید
        </p>
        <div id="empty_list">

        </div>
        <div id="close-btn">
            <p>
            اگر با خطا مواجه شدید، بر روی دریافت نمونه بزنید و فایل دریافتی را به روان‌شناس یا اپراتور مرکزمشاوره تحویل دهید
            </p>
            <a href="{!! urldecode(route('samples.close', substr($sample->id, 1)))!!}" data-method="PUT" data-lijax class="btn btn-primary">اتمام نمونه</a>
            <a id="download-close" href="#" class="btn btn-secondary">دریافت فایل نمونه</a>
        </div>
    </div>
</div>
