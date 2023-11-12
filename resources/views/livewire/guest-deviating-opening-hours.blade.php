<div class="mr-1 mt-5 ml-0">
    @if($this->table->getRecords()->isNotEmpty())
        {{ $this->table }}
    @endif
</div>
