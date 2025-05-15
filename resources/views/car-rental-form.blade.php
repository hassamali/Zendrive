<div x-data="{ subForm: 'intraCity' }" x-init="initFlatpickr($refs)">
    <div class="flex items-center space-x-4 mb-4 text-sm">
        <label class="flex items-center space-x-2">
            <input type="radio" name="subForm" value="intraCity" x-model="subForm">
            <span>Within City</span>
        </label>
        <label class="flex items-center space-x-2">
            <input type="radio" name="subForm" value="interCity" x-model="subForm">
            <span>Out of City</span>
        </label>
    </div>

    @include('components.booking.intra-city')
    @include('components.booking.inter-city')
</div>
