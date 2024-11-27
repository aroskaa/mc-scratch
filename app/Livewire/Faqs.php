<?php

namespace App\Livewire;

use App\Models\FAQ;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Cache;

class Faqs extends Component
{
    use WithPagination;

    public $questions, $answers, $status = true, $faqId;
    public $search = '';

    protected $queryString = ['search', 'page'];

    protected $rules = [
        'questions' => 'required|string|max:255',
        'answers' => 'required|string',
        'status' => 'boolean',
    ];

    public function render()
    {
        $faqs = FAQ::where('questions', 'like', '%' . $this->search . '%')
            ->paginate(10);

        return view('livewire.faqs', compact('faqs'));
    }

    public function save()
    {
        $this->validate();

        FAQ::updateOrCreate(
            ['id' => $this->faqId],
            ['questions' => $this->questions, 'answers' => $this->answers, 'status' => $this->status]
        );

        session()->flash('message', $this->faqId ? 'FAQ updated successfully!' : 'FAQ created successfully!');
        $this->resetForm();
    }

    public function edit($id)
    {
        $faq = FAQ::findOrFail($id);
        $this->faqId = $faq->id;
        $this->questions = $faq->questions;
        $this->answers = $faq->answers;
        $this->status = $faq->status;
    }

    public function delete($id)
    {
        FAQ::findOrFail($id)->delete();
        session()->flash('message', 'FAQ deleted successfully!');
    }

    public function resetForm()
    {
        $this->faqId = null;
        $this->questions = '';
        $this->answers = '';
        $this->status = true;
    }
}
