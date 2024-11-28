<div>
    <h1>Manage FAQs</h1>

    <form wire:submit.prevent="save">
        <input type="hidden" wire:model="faqId">
        <label>Questions</label>
        <input type="text" wire:model="questions" />
        @error('questions') <span class="error">{{ $message }}</span> @enderror

        <label>Answers</label>
        <textarea wire:model="answers"></textarea>
        @error('answers') <span class="error">{{ $message }}</span> @enderror

        <label>Status</label>
        <select wire:model="status">
            <option value="1">Active</option>
            <option value="0">Inactive</option>
        </select>

        <button type="submit">{{ $faqId ? 'Update' : 'Save' }}</button>
    </form>

    @if (session()->has('message'))
        <div>{{ session('message') }}</div>
    @endif

    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Questions</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($faqs as $faq)
                <tr>
                    <td>{{ $faq->id }}</td>
                    <td>{{ $faq->questions }}</td>
                    <td>{{ $faq->status ? 'Active' : 'Inactive' }}</td>
                    <td>
                        <button wire:click="edit('{{ $faq->id }}')">Edit</button>
                        <button wire:click="delete('{{ $faq->id }}')">Delete</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
