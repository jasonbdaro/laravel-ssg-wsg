<?php

namespace Jasonbdaro\Ssgwsg\Tests;

use Jasonbdaro\Ssgwsg\Facades\Ssgwsg;

class CourseTest extends BaseTestCase
{
    /** @test */
    public function it_can_retrieve_course_categories()
    {
        $data = Ssgwsg::getCourseCategories();
        $this->assertNotEmpty($data);
    }

    /** @test */
    public function it_can_retrieve_course_tags()
    {
        $data = Ssgwsg::getCourseTags();
        $this->assertNotEmpty($data);
    }

    /** @test */
    public function it_can_retrieve_course_subcategories()
    {
        $data = Ssgwsg::getCourseSubcategories();
        $this->assertNotEmpty($data);
    }

    /** @test */
    public function it_can_retrieve_course_details_and_related_courses()
    {
        $courses = Ssgwsg::getCourses();
        $data = Ssgwsg::getCourseDetails($courses['data']['courses'][0]['referenceNumber']);
        $this->assertNotEmpty($data);
        $related = Ssgwsg::getCourseRelated($courses['data']['courses'][0]['referenceNumber']);
        $this->assertNotEmpty($related);
    }

    /** @test */
    public function it_can_retrieve_course_autocomplete()
    {
        $data = Ssgwsg::getCourseAutocomplete();
        $this->assertNotEmpty($data);
    }

    /** @test */
    public function it_can_retrieve_course_popular()
    {
        $data = Ssgwsg::getCoursePopular();
        $this->assertNotEmpty($data);
    }

    /** @test */
    public function it_can_retrieve_course_featured()
    {
        $data = Ssgwsg::getCourseFeatured();
        $this->assertNotEmpty($data);
    }

    /** @test */
    public function it_can_retrieve_course_brochures()
    {
        $data = Ssgwsg::getCourseBrochures();
        $this->assertNotEmpty($data);
    }

    /** @test */
    public function it_can_retrieve_course_enquiries()
    {
        $data = Ssgwsg::getCourseEnquiries();
        $this->assertNotEmpty($data);
    }
}
