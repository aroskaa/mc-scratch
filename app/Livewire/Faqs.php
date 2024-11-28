<?php

namespace App\Livewire;

use App\Models\FAQ;
use Livewire\Component;

class Faqs extends Component
{

    public $questions, 
            $answers, 
            $status = true, 
            $faqId;

    protected $queryString = ['page'];
    
    protected $rules = [
        'questions' => 'required|string|max:255',
        'answers' => 'required|string',
        'status' => 'boolean',
    ];

    public function render()
    {
        $faqs = FAQ::paginate(10); // Fetch FAQs without search filtering
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
