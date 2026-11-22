<form class="form-card" method="POST" action="{{ $action }}">
    @csrf
    @if ($editing)
        @method('PUT')
    @endif

    <div class="form-field">
        <label for="nama">Nama</label>
        <input
            id="nama"
            name="nama"
            type="text"
            maxlength="30"
            value="{{ old('nama', $employe?->nama) }}"
            required
            aria-describedby="nama-error"
        >
        @error('nama')
            <p class="field-error" id="nama-error">{{ $message }}</p>
        @enderror
    </div>

    <div class="form-field">
        <label for="alamat">Alamat</label>
        <textarea
            id="alamat"
            name="alamat"
            required
            aria-describedby="alamat-error"
        >{{ old('alamat', $employe?->alamat) }}</textarea>
        @error('alamat')
            <p class="field-error" id="alamat-error">{{ $message }}</p>
        @enderror
    </div>

    <div class="form-field">
        <label for="gender">Gender</label>
        <select id="gender" name="gender" required aria-describedby="gender-error">
            <option value="">Pilih gender</option>
            <option value="L" @selected(old('gender', $employe?->gender) === 'L')>Laki-laki</option>
            <option value="P" @selected(old('gender', $employe?->gender) === 'P')>Perempuan</option>
        </select>
        @error('gender')
            <p class="field-error" id="gender-error">{{ $message }}</p>
        @enderror
    </div>

    <div class="form-field">
        <label for="gaji">Gaji (Rp)</label>
        <input
            id="gaji"
            name="gaji"
            type="number"
            min="0"
            step="1"
            value="{{ old('gaji', $employe?->gaji) }}"
            required
            aria-describedby="gaji-error"
        >
        @error('gaji')
            <p class="field-error" id="gaji-error">{{ $message }}</p>
        @enderror
    </div>

    <button class="button" type="submit">{{ $editing ? 'Simpan Perubahan' : 'Simpan Pegawai' }}</button>
</form>
