@section('scripts')
@parent
<script src="@staticVersion('/vendors/i18n/i18n.min.js')"></script>
<script src="@staticVersion('/js/lang/fa.js')"></script>
<script src="@staticVersion('/js/dashboard.min.js')"></script>
@if (auth()->user() && auth()->user()->public_key)
    <script>
        (() => {
            const auth_public_key = '{{ str_replace("\r\n", '\r\n', auth()->user()->public_key) }}';
            function str2ab(str) {
                const buf = new ArrayBuffer(str.length);
                const bufView = new Uint8Array(buf);
                for (let i = 0, strLen = str.length; i < strLen; i++) {
                bufView[i] = str.charCodeAt(i);
                }
                return buf;
            }
            let encryptionKey;
            async function importPublicKey() {
                console.log(1);
                const pemHeader = "-----BEGIN PUBLIC KEY-----";
                const pemFooter = "-----END PUBLIC KEY-----";
                const pemContents = auth_public_key.substring(pemHeader.length, auth_public_key.length - pemFooter.length);
                const binaryDerString = window.atob(pemContents);
                const binaryDer = str2ab(binaryDerString);

                encryptionKey = await window.crypto.subtle.importKey(
                "spki",
                binaryDer,
                {
                    name: "RSA-OAEP",
                    hash: "SHA-256"
                },
                true,
                ["encrypt"]
                );
                console.log(encryptionKey);
            }
            console.log(encryptionKey);
            importPublicKey();
            console.log(encryptionKey);
            let ciphertext;
            async function encryptMessage(text) {
                console.log(encryptionKey);
                ciphertext = await window.crypto.subtle.encrypt(
                    {
                    name: "RSA-OAEP"
                    },
                    encryptionKey,
                    (new TextEncoder()).encode(text)
                );
                return await (new TextDecoder("utf-8")).decode(ciphertext);
            }
            async function decryptMessage(key) {
                let decrypted = await window.crypto.subtle.decrypt(
                    {
                    name: "RSA-OAEP"
                    },
                    key,
                    ciphertext
                );

                let dec = new TextDecoder();
                const decryptedValue = document.querySelector(".rsa-oaep .decrypted-value");
                decryptedValue.classList.add('fade-in');
                decryptedValue.addEventListener('animationend', () => {
                    decryptedValue.classList.remove('fade-in');
                });
                decryptedValue.textContent = dec.decode(decrypted);
            }
            window.encryptMessage = encryptMessage;
            window.decryptMessage = decryptMessage;
        })();
    </script>
@endif
@endsection
@include('layouts._scripts')
