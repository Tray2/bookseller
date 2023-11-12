  <div id="guest-opening-hours" class="mt-5 mr-1 ml-0">
        {{ $this->table }}
        <script>
            let caret = document.querySelector('#guest-opening-hours thead tr th');
            caret.classList.add('flex');
            caret.innerHTML += `<svg class="fi-icon-btn-icon h-5 w-5 fill-stone-200"
                                     xmlns="http://www.w3.org/2000/svg"
                                     viewBox="0 0 20 20"
                                     aria-hidden="true"
                                >
                                    <path
                                        fill-rule="evenodd"
                                        d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0
                                           111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0
                                           01.02-1.06z"
                                        clip-rule="evenodd"
                                    ></path>
                                </svg>`;

            caret.lastChild.classList.add('rotate-180');
            caret.parentElement.parentElement.classList.add('bg-violet-950');
            caret.firstElementChild.firstElementChild.classList.add('text-stone-200', 'text-base');
            caret.firstElementChild.firstElementChild.classList.remove('text-sm');

            document.querySelector('#guest-opening-hours').addEventListener('click', function() {
                let tbody = document.querySelector('#guest-opening-hours tbody');
                tbody.classList.toggle('is-hidden');
                caret.lastChild.classList.toggle('rotate-180');
            });
        </script>

        <style>
            .is-hidden {
                display: none;
            }

        </style>
    </div>
