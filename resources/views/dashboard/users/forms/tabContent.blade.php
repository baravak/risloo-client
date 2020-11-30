<div class="tab-pane fade pt-3" id="public-key" role="tabpanel" aria-labelledby="public-key-tab">
    <div class="alert alert-info fs-12" role="alert">
        <p>
            در این قسمت شما می‌توانید با استفاده از دراختیار قراردادن کلید عمومی رمزگذاری نامتقارن خود، داده‌های خود را در ریسلو کدگذاری کنید و تنها خودتان به آن‌ها دسترسی خواهید داشت.
        </p>
        <p>
            <strong>فایده این کار چیست؟</strong>
            <ul>
                <li>
                    کلید عمومی: این کلید در اختیار ما قرار می‌گیرد و با این کلید تنها می‌توان داده‌های ارسالی شما را رمزگذاری کرد
                    <ul>
                        <li>
                            توجه داشته باشید که با این کلید نمی‌توان داده‌های رمزگذاری‌شده را خواند
                        </li>
                        <li>
                            ما به شما این اطمینان را می‌دهیم که داده‌های شما قبل از ارسال به سمت ریسلو، در مرورگر خود شما رمزگذاری شده و ما از آن‌ها بی‌اطلاع خواهیم بود، تنها داده رمزگذاری‌شده را در سیستم زخیره می‌کنیم
                        </li>
                    </ul>
                </li>
                <li>
                    کلید خصوصی: این کلید تنها در اختیار خود شما باقی می‌ماند و ما از آن بی‌اطلاع هستیم، شما با این کلید می‌توانید داده‌های رمزگذاری‌شده خودتان را مشاهده نمایید
                    <ul>
                        <li>
                            بدانید که ارزش این کلید به آن است که فقط و فقط در اختیار خود شما باشد، اگر این کلید در دست حتی یک نفر دیگر غیر از خود شما باشد، ارزش امنیتی آن صفر است
                        </li>
                        <li>
                            از آن‌جا که کلید خصوصی تنها در اختیار خود شماست و ریسلو از آن بی‌اطلاع است، در حفظ و نگهداری آن کوشا باشید، در غیر این‌صورت اگر کلید خصوصی را به هر صورتی از دست دادید، داده‌های رمزگذاری‌شده شما غیر قابل بازگشت خواهد بود.
                        </li>
                    </ul>
                </li>
            </ul>
        </p>
        <p>
            <strong>چه چیزهایی رمزگذاری می‌شوند؟</strong>
            <ul>
                <li>گزارش جلسات درمانی</li>
            </ul>
        </p>
        <p>
            <strong>آیا می‌توانم کلید عمومی خودم را ویرایش کنم؟</strong>
            درحال حاضر این امکان برای شما مهیا نیست.
        </p>
    </div>
    @if (auth()->user() && auth()->user()->public_key)
        <div class="card-body">
            <div class="form-group form-group-m">
                <textarea disabled class="form-control form-control-m text-left direction-ltr fs-10" name="publicKey" id="publicKey" cols="30" rows="10" style="resize: none">{{ auth()->user()->public_key }}</textarea>
                <label for="publicKey">{{__('Public key')}}</label>
            </div>
        </div>
    @else
        <form action="{{route('dashboard.users.publicKey', ['user' => $user->id])}}" method="POST">
            <div class="card-body">
                <div class="form-group form-group-m">
                    <textarea class="form-control form-control-m text-left direction-ltr fs-10" name="publicKey" id="publicKey" cols="30" rows="10" style="resize: none"></textarea>
                    <label for="publicKey">{{__('Public key')}}</label>
                </div>
                <button type="submit" class="btn btn-primary">
                    {{__('Set public key')}}
                </button>
            </div>
        </form>
        @endif
        <div class="alert alert-info fs-12" role="alert">
            <p>
                برای این‌که بتوانید راحت و در خود سرویس ریسلو متون کدگذاری‌شده خود را ببینید، می‌توانید کلید خصوصی خود را در زیر قرار دهید
                <ul>
                    <li>می‌توانید به ما اطمینان نکنید و کلید خصوصی را نزد خود نگهداری کنید و به صورت دستی محتواهای کدگذاری‌شده را بازگشایی کنید</li>
                    <li>ما کلید خصوصی شما را در حافظه مرورگر خودتان نگهداری می‌کنیم و این کلید اصلا به سمت ریسلو ارسال نخواهد شد</li>
                    <li>کلید خصوصی را تنها زمانی که رایانه متعلق به شماست وارد کنید؛ زیرا دیگران می‌توانند به کلید خصوصی شما از طریق آن رایانه دسترسی داشته باشند</li>
                </ul>
            </p>
        </div>
        <div class="card-body">
            <div class="form-group form-group-m">
                <textarea class="form-control form-control-m text-left direction-ltr fs-10" name="privateKey" id="privateKey" cols="30" rows="10" style="resize: none"></textarea>
                <label for="privateKey">{{__('private key')}}</label>
            </div>
        </div>
</div>
