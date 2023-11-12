<div id="contact-info-list" class="m-1 mt-5 ml-0">
    @if($this->infolist->record != [])
        {{ $this->infolist }}
    @endif

    <script>
        let headers = document.querySelectorAll('#contact-info-list header');
        headers.forEach((el) => {
            el.classList.add('bg-violet-950', 'rounded-t-xl');
            el.querySelector('h3').classList.add('text-stone-200');

            el.addEventListener('click', () => {
                if(el.parentElement.classList.contains('fi-collapsed'))
                {
                    el.classList.remove('rounded-b-xl');
                } else {
                    el.classList.add('rounded-b-xl');
                }
            });
        });
    </script>
</div>
