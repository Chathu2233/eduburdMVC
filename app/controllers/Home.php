<?php 

/**
 * Home Controller
 */
class Home
{
    use Controller;

    public function index()
    {
        // Fetch data from the model or directly in the controller
        $offers = $this->getOffers();
        $studentLevels = $this->getStudentLevels();
        $testimonials = $this->getTestimonials();

        // Pass the data to the view
        $this->view('home', [
            'offers' => $offers,
            'studentLevels' => $studentLevels,
            'testimonials' => $testimonials
        ]);
    }

    public function getOffers()
    {
        // Static offers for now, you can later replace this with a database call
        return [
            'One-to-One Personalized Tutoring',
            'Live Classes',
            'Expert Handpicked Teachers',
            'Parental Dashboard',
            'Learn From Anywhere',
            'Feasible Booking Schedules',
            'Progress Tracking',
            'Resource Library',
            'Discussion Forums'
        ];
    }

    public function getStudentLevels()
    {
        // Static student levels for now
        return ['Primary Student', 'Lower Secondary', 'IGCSE', 'AS & A2'];
    }

    public function getTestimonials()
    {
        // Static testimonials for now
        return [
            ['quote' => 'The platform is so easy to use, and I love being able to choose teachers who match my learning style.', 'author' => 'Godfri'],
            ['quote' => 'The teachers on Eduburd are amazing! They explain concepts so well, and I can always ask questions without feeling nervous.', 'author' => 'Vee'],
            ['quote' => 'My mom says she\'s never seen me this excited about studying before Eduburd. I think she\'s right!', 'author' => 'Yoosuf']
        ];
    }
}
