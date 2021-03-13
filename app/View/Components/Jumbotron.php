<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Jumbotron extends Component
{

    public $display;
    public $paragraphOne;
    public $paragraphTwo;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($type)
    {
        $this->type = $type;
    }

    /**
     * Sets the text of the Jumbotron depending on its type.
     *
     * @return void
     */
    public function setVariables()
    {
        if ($this->type == "home") {
            $this->display      = "Web Security in " . date('Y') . " and Web Development";
            $this->paragraphOne = "Tips and drills on how be to more secure in the digital era when working on the internet and on devices in general.";
            $this->paragraphTwo = "Are you a web developer? This is also for you! Check our 'Development' section in our blog."; 

        } else if ($this->type == "contact") {
            $this->display      = "Contact Us";
            $this->paragraphOne = "Got any questions, suggestions or comments? Please, feel free to contact us! We will be happy to hear from you.";
            $this->paragraphTwo = "We will reply as soon as possible.";
        } else if ($this->type == "controlpanel") {
            $this->display      = "Pellizzer Tech Blog - Control Panel";
            $this->paragraphOne = "Manage your users, posts and all your application from here. ";
            $this->paragraphTwo = "Remember: With great powers comes great responsibility";
        }
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        $this->setVariables();
        return view('components.jumbotron');
    }
}
