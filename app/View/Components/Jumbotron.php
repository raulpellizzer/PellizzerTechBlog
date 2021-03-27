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
            $this->paragraphOne = "Tips and drills on how be to more secure in the digital era when working on the internet and on devices in general";
            $this->paragraphTwo = "Are you a web developer? This is also for you! Check our blogs for security and development themes"; 

        } else if ($this->type === "contact") {
            $this->display      = "Contact Us";
            $this->paragraphOne = "Got any questions, suggestions or comments? Please, feel free to contact us! We will be happy to hear from you";
            $this->paragraphTwo = "We will reply as soon as possible";

        } else if ($this->type === "controlpanel") {
            $this->display      = "Pellizzer Tech Blog - Control Panel";
            $this->paragraphOne = "Manage your users, posts and all your application from here";
            $this->paragraphTwo = "Remember: With great powers comes great responsibility";

        } else if ($this->type === "newpost") {
            $this->display      = "Create a New Post";
            $this->paragraphOne = "Use the fields below to create your new, awesome post!";
            $this->paragraphTwo = "The body supports up to 65.535 characters";

        } else if ($this->type === "blogindex") {
            $this->display      = "Blogs";
            $this->paragraphOne = "Read about technology, security, development and much more!";
            $this->paragraphTwo = "";

        } else if ($this->type === "usermanagement") {
            $this->display      = "User Management - Control Panel";
            $this->paragraphOne = "Manage your users with ease";
            $this->paragraphTwo = "Grant access, check their data, activate or deactivate";

        } else if ($this->type === "postmanagement") {
            $this->display      = "Post Management - Control Panel";
            $this->paragraphOne = "Manage your posts with ease";
            $this->paragraphTwo = "Create, edit or simply deactivate a post";

        } else if ($this->type === "editpost") {
            $this->display      = "Editing your post";
            $this->paragraphOne = "Edit your content here";
            $this->paragraphTwo = "";

        } else if ($this->type === "createcategorie") {
            $this->display      = "Create a new categorie";
            $this->paragraphOne = "Categories give more meaning to your posts";
            $this->paragraphTwo = "";

        } else if ($this->type === "email") {
            $this->display      = "New message from blog contact";
            $this->paragraphOne = "A new message has been sent to you";
            $this->paragraphTwo = "";
            
        } else if ($this->type === "notification") {
            $this->display      = "New Post Notification!";
            $this->paragraphOne = "A new post has just been created";
            $this->paragraphTwo = "Check it out!";
        } else if ($this->type === "accountverification") {
            $this->display      = "Registration to Pellizzer Tech Blog";
            $this->paragraphOne = "Verify your account to log in";
            $this->paragraphTwo = "If you dont recognize this action, please ignore this email";
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
