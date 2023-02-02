<div class="container mx-auto ">
    @push('styles')
        @trixassets
    @endpush
    <form method="post" action="{{ route('posts.store') }}">
        @foreach ($errors->all() as $error)
            <p class="alert alert-danger">{{ $error }}</p>
        @endforeach

        @csrf
        {{-- <select name="Category"> --}}
        <div class="mb-5 w-fit">
            <label
                for="name"
                class="mb-3 block text-base font-medium text-[#07074D]"
            >
                Title
            </label>
            <input
                type="text"
                name="name"
                id="name"
                placeholder="Full Name"
                class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-amber-400 focus:shadow-md"
            />
        </div>
        <div class="mb-5 w-fit">
            <label
                for="subject"
                class="mb-3 block text-base font-medium text-[#07074D]"
            >
                Category
            </label>
            <input
                type="text"
                name="subject"
                id="subject"
                placeholder="Enter your subject"
                class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-amber-400 focus:shadow-md"
            />
        </div>
        <div class="w-full mb-5">
            <input id="x" type="hidden" name="content" value="<h1>This is content</h1>" />
            <label for="message" class="mb-3 block text-base font-medium text-[#07074D]">Body</label>
            <trix-editor input="x" class="trix-content w-full resize-none rounded-md border py-3 px-6
            border-[#e0e0e0] bg-white text-base font-medium text-[#6B7280] outline-none focus:shadow-md
            focus:border-amber-400 " rows="4" name="message" id="message"></trix-editor>
        </div>
         <div class="">
            <button type="submit" name="submit" value="Submit" class="px-8 py-3 text-base font-semibold text-white bg-yellow-400 rounded-md outline-none hover:shadow-form hover:bg-amber-400">
              Submit
            </button>
        </div>
    </form>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.min.js"></script>
    <script>
        (function() {
            var HOST = "http://localhost:8000/upload"; //pass the route

            addEventListener("trix-attachment-add", function(event) {
                if (event.attachment.file) {
                    uploadFileAttachment(event.attachment)
                }
            })

            function uploadFileAttachment(attachment) {
                uploadFile(attachment.file, setProgress, setAttributes)

                function setProgress(progress) {
                    attachment.setUploadProgress(progress)
                }

                function setAttributes(attributes) {
                    attachment.setAttributes(attributes)
                }
            }

            function uploadFile(file, progressCallback, successCallback) {
                var formData = createFormData(file);
                var xhr = new XMLHttpRequest();

                xhr.open("POST", HOST, true);
                xhr.setRequestHeader( 'X-CSRF-TOKEN', getMeta( 'csrf-token' ) );

                xhr.upload.addEventListener("progress", function(event) {
                    var progress = event.loaded / event.total * 100
                    progressCallback(progress)
                })

                xhr.addEventListener("load", function(event) {
                    var attributes = {
                        url: xhr.responseText,
                        href: xhr.responseText + "?content-disposition=attachment"
                    }
                    successCallback(attributes)
                })

                xhr.send(formData)
            }

            function createFormData(file) {
                var data = new FormData()
                data.append("Content-Type", file.type)
                data.append("file", file)
                return data
            }

            function getMeta(metaName) {
                const metas = document.getElementsByTagName('meta');

                for (let i = 0; i < metas.length; i++) {
                if (metas[i].getAttribute('name') === metaName) {
                    return metas[i].getAttribute('content');
                }
                }

                return '';
            }
        })();
    </script>
</div>
