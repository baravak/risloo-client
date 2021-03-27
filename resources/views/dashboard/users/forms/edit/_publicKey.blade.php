<div class="p-4 border border-gray-200 rounded text-sm cursor-default" role="alert">
    <p class="text-gray-600">در این قسمت شما می‌توانید با استفاده از دراختیار قراردادن کلید عمومی رمزگذاری نامتقارن خود، داده‌های خود را در ریسلو کدگذاری کنید و تنها خودتان به آن‌ها دسترسی خواهید داشت.</p>

    <div class="mt-4">
        <h3 class="font-semibold text-gray-800">فایده این کار چیست؟</h3>
        <ul class="mt-4 pr-6 text-gray-600">
            <li class="mt-2">
                - کلید عمومی: این کلید در اختیار ما قرار می‌گیرد و با این کلید تنها می‌توان داده‌های ارسالی شما را رمزگذاری کرد
                <ul class="mt-2 pr-6">
                    <li class="mt-2">+ توجه داشته باشید که با این کلید نمی‌توان داده‌های رمزگذاری‌شده را خواند</li>
                    <li class="mt-2">+ ما به شما این اطمینان را می‌دهیم که داده‌های شما قبل از ارسال به سمت ریسلو، در مرورگر خود شما رمزگذاری شده و ما از آن‌ها بی‌اطلاع خواهیم بود، تنها داده رمزگذاری‌شده را در سیستم زخیره می‌کنیم</li>
                </ul>
            </li>
            <li class="mt-2">
                - کلید خصوصی: این کلید تنها در اختیار خود شما باقی می‌ماند و ما از آن بی‌اطلاع هستیم، شما با این کلید می‌توانید داده‌های رمزگذاری‌شده خودتان را مشاهده نمایید
                <ul class="mt-2 pr-6">
                    <li class="mt-2">+ بدانید که ارزش این کلید به آن است که فقط و فقط در اختیار خود شما باشد، اگر این کلید در دست حتی یک نفر دیگر غیر از خود شما باشد، ارزش امنیتی آن صفر است</li>
                    <li class="mt-2">+ از آن‌جا که کلید خصوصی تنها در اختیار خود شماست و ریسلو از آن بی‌اطلاع است، در حفظ و نگهداری آن کوشا باشید، در غیر این‌صورت اگر کلید خصوصی را به هر صورتی از دست دادید، داده‌های رمزگذاری‌شده شما غیر قابل بازگشت خواهد بود.</li>
                </ul>
            </li>
        </ul>
    </div>

    <div class="mt-4">
        <h3 class="font-semibold text-gray-800">چه چیزهایی رمزگذاری می‌شوند؟</h3>
        <ul class="mt-4 pr-6 text-gray-600">
            <li>گزارش جلسات درمانی</li>
        </ul>
    </div>

    <div class="mt-4">
        <h3 class="font-semibold text-gray-800">آیا می‌توانم کلید عمومی خودم را ویرایش کنم؟</h3>
        <ul class="mt-4 pr-6 text-gray-600">
            <li>درحال حاضر این امکان برای شما مهیا نیست.</li>
        </ul>
    </div>

    @if (auth()->user() && auth()->user()->public_key)

    <div class="mt-8 w-full">
        <label for="publicKey" class="block mb-2 text-sm text-gray-700 font-medium">{{ __('Public key') }}</label>
        <textarea disabled id="publicKey" name="publicKey" cols="30" rows="10" class="resize-none text-left dir-ltr border border-gray-500 rounded px-4 py-2 w-full text-sm placeholder-gray-300 focus:border-brand focus:outline-none focus:ring-2 focus:ring-offset-1 focus:ring-opacity-60">{{ auth()->user()->public_key }}</textarea>
    </div>

    @else

        <form class="mt-8 w-full" action="{{route('dashboard.users.publicKey', ['user' => $user->id])}}" method="POST">
            <div>
                <label for="publicKey">{{__('Public key')}}</label>
                <textarea class="resize-none text-left dir-ltr border border-gray-500 rounded px-4 py-2 w-full text-sm placeholder-gray-300 focus:border-brand focus:outline-none focus:ring-2 focus:ring-offset-1 focus:ring-opacity-60 mt-2" name="publicKey" id="publicKey" cols="30" rows="10"></textarea>
            </div>

            <button type="submit" class="inline-flex items-center justify-center h-9 mt-4 px-8 bg-brand text-white text-sm rounded-full hover:bg-brand-600 focus transition">
                {{ __('Set public key') }}
            </button>
        </form>

    @endif
</div>

<div class="p-4 border border-gray-200 rounded text-sm cursor-default mt-8" role="alert">
    <div>
        <p class="text-gray-600">برای این‌که بتوانید راحت و در خود سرویس ریسلو متون کدگذاری‌شده خود را ببینید، می‌توانید کلید خصوصی خود را در زیر قرار دهید</p>
        <ul class="mt-4 pr-6 text-gray-600">
            <li class="mt-2">- می‌توانید به ما اطمینان نکنید و کلید خصوصی را نزد خود نگهداری کنید و به صورت دستی محتواهای کدگذاری‌شده را بازگشایی کنید</li>
            <li class="mt-2">- ما کلید خصوصی شما را در حافظه مرورگر خودتان نگهداری می‌کنیم و این کلید اصلا به سمت ریسلو ارسال نخواهد شد</li>
            <li class="mt-2">- کلید خصوصی را تنها زمانی که رایانه متعلق به شماست وارد کنید؛ زیرا دیگران می‌توانند به کلید خصوصی شما از طریق آن رایانه دسترسی داشته باشند</li>
        </ul>
    </div>

    <form class="mt-8 w-full" action="{{route('dashboard.users.publicKey', ['user' => $user->id])}}" method="POST">
        <div>
            <label for="privateKey">{{__('Privet key')}}</label>
            <textarea class="resize-none text-left dir-ltr border border-gray-500 rounded px-4 py-2 w-full text-sm placeholder-gray-300 focus:border-brand focus:outline-none focus:ring-2 focus:ring-offset-1 focus:ring-opacity-60 mt-2" name="privateKey" id="privateKey" cols="30" rows="10"></textarea>
        </div>

        <button type="submit" class="inline-flex items-center justify-center h-9 mt-4 px-8 bg-brand text-white text-sm rounded-full hover:bg-brand-600 focus transition">
            {{ __('Set privet key') }}
        </button>
    </form>
</div>