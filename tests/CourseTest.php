<?php

namespace Jasonbdaro\Ssgwsg\Tests;

use Jasonbdaro\Ssgwsg\Facades\Ssgwsg;

class CourseTest extends BaseTestCase
{
    /** @test */
    public function test_retrieve_courses()
    {
        $this->it_can_retrieve_course_categories();
        $this->it_can_retrieve_course_tags();
        $this->it_can_retrieve_course_subcategories();
        $this->it_can_retrieve_course_details_and_related_courses();
        $this->it_can_retrieve_course_autocomplete();
        $this->it_can_retrieve_course_popular();
        $this->it_can_retrieve_course_featured();
        $this->it_can_retrieve_course_brochures();
        $this->it_can_retrieve_course_enquiries();
    }

    private function it_can_retrieve_course_categories()
    {
        $data = Ssgwsg::getCourseCategories();
        $this->assertNotEmpty($data);
    }

    private function it_can_retrieve_course_tags()
    {
        $data = Ssgwsg::getCourseTags();
        $this->assertNotEmpty($data);
    }

    private function it_can_retrieve_course_subcategories()
    {
        $data = Ssgwsg::getCourseSubcategories();
        $this->assertNotEmpty($data);
    }

    private function it_can_retrieve_course_details_and_related_courses()
    {
        $courses = Ssgwsg::getCourses();
        $data = Ssgwsg::getCourseDetails($courses['data']['courses'][0]['referenceNumber']);
        $this->assertNotEmpty($data);
        $related = Ssgwsg::getCourseRelated($courses['data']['courses'][0]['referenceNumber']);
        $this->assertNotEmpty($related);
    }

    private function it_can_retrieve_course_autocomplete()
    {
        $data = Ssgwsg::getCourseAutocomplete();
        $this->assertNotEmpty($data);
    }

    private function it_can_retrieve_course_popular()
    {
        $data = Ssgwsg::getCoursePopular();
        $this->assertNotEmpty($data);
    }

    private function it_can_retrieve_course_featured()
    {
        $data = Ssgwsg::getCourseFeatured();
        $this->assertNotEmpty($data);
    }

    private function it_can_retrieve_course_brochures()
    {
        $data = Ssgwsg::getCourseBrochures();
        $this->assertNotEmpty($data);
    }

    private function it_can_retrieve_course_enquiries()
    {
        $data = Ssgwsg::getCourseEnquiries();
        $this->assertNotEmpty($data);
    }
}
