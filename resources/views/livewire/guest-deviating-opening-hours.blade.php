<div id="guest-deviating-opening-hours" class="mr-1 mt-5 ml-0">
    @if($this->table->getRecords()->isNotEmpty())
        {{ $this->table }}
    @endif
    <script>
        let sign = document.querySelector('#guest-deviating-opening-hours thead tr th');
        sign.classList.add('flex');
        sign.innerHTML += `<svg class="fi-icon-btn-icon h-5 w-5 fill-stone-200"
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

        sign.lastChild.classList.add('rotate-180');
        sign.parentElement.parentElement.classList.add('bg-violet-950');
        sign.firstElementChild.firstElementChild.classList.add('text-stone-200', 'text-base');
        sign.firstElementChild.firstElementChild.classList.remove('text-sm');

        document.querySelector('#guest-deviating-opening-hours').addEventListener('click', function() {
            let tbody = document.querySelector('#guest-deviating-opening-hours tbody');
            tbody.classList.toggle('is-hidden');
            sign.lastChild.classList.toggle('rotate-180');
        });
    </script>
</div>
