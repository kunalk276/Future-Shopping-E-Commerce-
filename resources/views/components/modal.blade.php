<div style="display: none" class="modal-container">
    <div class="modal">
        <div class="modal-card">
            {{-- Modal Title --}}
            <h3>{{ $title }}</h3>

            {{-- Modal Description --}}
            <p>{{ $description }}</p>

            {{-- Action Buttons --}}
            <div class="action flex_align">
                <button onclick="closeModal()" class="modal-cancel">
                    {{ $cancel ?? 'Cancelar' }}
                </button>
                <button class="modal-ok">
                    {{ $ok }}
                </button>
            </div>
        </div>

        {{-- Close Icon --}}
        <span onclick="closeModal()" class="material-icons">close</span>
    </div>
</div>
