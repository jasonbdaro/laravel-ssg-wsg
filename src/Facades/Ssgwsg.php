<?php

namespace Jasonbdaro\Ssgwsg\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static mixed getCourseCategories()
 * @method static mixed getCourseTags()
 * @method static mixed getCourseSubcategories()
 * @method static mixed getCourseDetails()
 * @method static mixed getCourseRelated()
 * @method static mixed getCourses()
 * @method static mixed getCourseAutocomplete()
 * @method static mixed getCoursePopular()
 * @method static mixed getCourseFeatured()
 * @method static mixed getCourseBrochures()
 * @method static mixed getCourseEnquiries()
 */

class Ssgwsg extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'ssgwsg';
    }
}
