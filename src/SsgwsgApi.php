<?php

namespace Jasonbdaro\Ssgwsg;

use Jasonbdaro\Ssgwsg\Resources\BaseResource;

class SsgwsgApi extends BaseResource
{
    /*
     * Courses API, Course Feedback API, and Training Providers API
     */
    const GET_COURSE_CATEGORIES = '/courses/categories';
    const GET_COURSE_TAGS = '/courses/tags';
    const GET_COURSE_SUBCATEGORIES = '/courses/categories/{browCategoryId}/subCategories';
    const GET_COURSE_DETAILS = '/courses/directory/{courseReferenceNumber}';
    const GET_COURSE_RELATED = '/courses/directory/{courseReferenceNumber}/related';
    const GET_COURSES = '/courses/directory';
    const GET_COURSE_AUTOCOMPLETE = '/courses/directory/autocomplete';
    const GET_COURSE_POPULAR = '/courses/directory/popular';
    const GET_COURSE_FEATURED = '/courses/directory/featured';
    const GET_COURSE_BROCHURES = '/courses/brochures';
    const POST_COURSE_BROCHURES = '/courses/brochures';
    const POST_UPDATE_BROCHURES = '/courses/brochures/{brochureId}';
    const GET_COURSE_ENQUIRIES = '/courses/enquiries';
    const POST_COURSE_ENQUIRIES = '/courses/enquiries';
    const POST_DELETE_COURSE_ENQUIRIES = '/courses/enquiries/{enquiryId}';
    const GET_COURSE_RUNS = '/courses/runs';
    const POST_COURSE_ENRICHMENT = '/courses/enrichment';
    const GET_WEBHOOK_EVENTS = '/notifications/webhook/events';
    const GET_WEBHOOK_SUBSCRIPTIONS = '/notifications/webhook/subscriptions';
    const POST_UPDATE_WEBHOOK_SUBSCRIPTIONS = '/notifications/webhook/subscriptions';
    const GET_TPG_COURSES = '/tpg/courses/registry/details/{courseReferenceNumber}';
    const POST_TPG_COURSES_SEARCH = '/tpg/courses/registry/search';
    const GET_COURSE_LIKES = '/courses/directory/{courseReferenceNumber}/likes';
    const POST_UPDATE_COURSES_LIKES = '/courses/directory/{courseReferenceNumber}/likes';
    const GET_COURSES_DISLIKES = '/courses/directory/{courseReferenceNumber}/dislikes';
    const POST_UPDATE_COURSES_DISLIKES = '/courses/directory/{courseReferenceNumber}/dislikes';
    const GET_COURSES_COMMENTS = '/courses/directory/{courseReferenceNumber}/comments';
    const POST_COURSES_COMMENTS = '/courses/directory/{courseReferenceNumber}/comments';
    const POST_UPDATE_COURSES_COMMENTS = '/courses/directory/{courseReferenceNumber}/comments/{commentId}';
    const POST_COURSES_REPLIES = '/courses/directory/{courseReferenceNumber}/comments/{commentId}/replies';
    const POST_UPDATE_COURSES_REPLIES = '/courses/directory/{courseReferenceNumber}/comments/{commentId}/replies/{replyId}';
    const GET_COURSES_QUALITY = '/courses/directory/{courseReferenceNumber}/quality';
    const GET_COURSES_OUTCOME = '/courses/directory/{courseReferenceNumber}/outcome';
    const GET_COURSE_RUN_OLD = '/courses/runs/{runId}';
    const POST_COURSE_RUN_OLD = '/courses/runs';
    const POST_COURSE_RUN = '/courses/courseRuns/publish';
    const GET_COURSE_RUN = '/courses/courseRuns/id/{runId}';
    const POST_DELETE_COURSE_RUN = '/courses/runs/{courseRunId}';
    const POST_COURSE_RUN_SESSION_ATTENDANCE = '/courses/runs/{runId}/sessions/attendance';
    const GET_COURSE_RUN_SESSIONS = '/courses/runs/{runId}/sessions';
    const GET_COURSE_RUN_SESSION_ATTENDANCE = '/courses/runs/{runId}/sessions/attendance';
    const GET_TRAINERS = '/trainingProviders/{uen}/trainers';
    const POST_TRAINERS = '/trainingProviders/{uen}/trainers';
    const POST_UPDATE_TRAINERS = '/trainingProviders/{uen}/trainers/{trainerId}';
    const GET_TP_COURSES = '/trainingproviders/{uen}/courses';
    const POST_UPDATE_COURSE_RUN = '/courses/courseRuns/edit/{courseRunId}';
    const GET_COURSE_RUNS_REFERENCE = '/courses/courseRuns/reference';

    /*
     * Grant Calculator API, SkillsFuture Credit Pay API, Enrolments API, and Assessments API
     */
    const POST_GRANT_CALCULATORS = '/grantCalculators/individual';
    const POST_GRANT_CALCULATORS_PERSONALISED = '/grantCalculators/individual/personalised';
    const POST_SEARCH_GRANTS = '/tpg/grants/search';
    const GET_GRANTS = '/tpg/grants/details/{referenceNumber}';
    const GET_GRANTS_CODE = '/tpg/codes/grants/{grantsParameter}';
    const GET_CODES_ERROR = '/tpg/codes/error/{codeParameter}';
    const POST_SF_PAYMENT_ENCRYPT = '/skillsFutureCredits/claims/encryptRequests';
    const POST_SF_PAYMENT_DECRYPT = '/skillsFutureCredits/claims/decryptRequests';
    const POST_SF_PAYMENT_DOCS = '/skillsFutureCredits/claims/{claimId}/supportingdocuments';
    const GET_SF_PAYMENT = '/skillsFutureCredits/claims/{claimId}';
    const POST_SF_PAYMENT_CANCEL = '/skillsFutureCredits/claims/{claimId}';
    const POST_ENROLMENT = '/tpg/enrolments';
    const POST_UPDATE_ENROLMENT = '/tpg/enrolments/details/{referenceNumber}';
    const POST_SEARCH_ENROLMENT = '/tpg/enrolments/search';
    const GET_VIEW_ENROLMENT = '/tpg/enrolments/details/{referenceNumber}';
    const POST_UPDATE_FEE = '/tpg/enrolments/feeCollections/{referenceNumber}';
    const GET_ENROLMENT_LOOKUP = '/tpg/codes/enrolments/{enrolmentParameter}';
    const POST_ASSESSMENT = '/tpg/assessments';
    const POST_UPDATE_ASSESSMENT = '/tpg/assessments/details/{referenceNumber}';
    const POST_SEARCH_ASSESSMENT = '/tpg/assessments/search';
    const GET_VIEW_ASSESSMENT = '/tpg/assessments/details/{referenceNumber}';
    const GET_ASSESSMENT_LOOKUP = '/tpg/codes/assessments/{assessmentParameter}';

    /*
     * Skills Passport API
     */
    const GET_SKILL_QUALIFICATION = '/skillsPassport/codes/qualifications';
    const GET_SKILL_LICENSES = '/skillsPassport/codes/licenses/autocomplete';

    /*
     * Skills Framework API, Resources API, Articles API, and Events API
     */
    const GET_JOBROLE_TITLES = '/skillsFramework/jobRoles/titles';
    const GET_SKILLS_COMPETENCIES = '/skillsFramework/codes/skillsAndCompetencies/generic/autocomplete';
    const GET_FIELD_OF_STUDIES = '/skillsFramework/codes/fieldOfStudies';
    const GET_TSC_AUTOCOMPLETE = '/skillsFramework/codes/skillsAndCompetencies/technical/autocomplete';
    const GET_JOB_ROLES = '/skillsFramework/jobRoles';
    const GET_OCCUPATIONS = '/skillsFramework/occupations';
    const GET_SSIC = '/skillsFramework/codes/ssic';
    const GET_TSC_AUTOCOMPLETE_DETAILS = '/skillsFramework/codes/skillsAndCompetencies/technical/autocomplete/details';
    const GET_JOBROLE_RELATED = '/skillsFramework/jobRoles/{jobRoleId}/related';
    const GET_JOBROLE_PROFILE = '/skillsFramework/jobRoles/profile';
    const GET_JOBROLE_DETAILS = '/skillsFramework/jobRoles/details';
    const GET_SECTOR = '/skillsFramework/sectors/{sectorId}';
    const GET_SECTORS_VIDEO = '/skillsFramework/sectors/{sectorId}/video';
    const GET_SKILLS_COMPETENCIES_DETAILS = '/skillsFramework/codes/skillsAndCompetencies/generic/autocomplete/details';
    const GET_JOBROLES_OCCUPATION = '/skillsFramework/{occupationId}/jobRoles';
    const GET_SECTORS = '/skillsFramework/sectors';
    const GET_SUBSECTORS = '/skillsFramework/sectors/{sectorId}/subSectors/{subSectorId}';
    const GET_TSC_DETAILS = '/skillsFramework/codes/skillsAndCompetencies/technical/details';
    const GET_CCS_DETAILS = '/skillsFramework/codes/skillsAndCompetencies/generic/details';
    const GET_MYSF_MENU = '/resources/mySfPortalMainMenuSettings';
    const GET_ARTICLE_DETAILS = '/resources/articles/details';
    const GET_EVENT_DETAILS = '/resources/events/details';
    const GET_EVENTS_FILTERED = '/resources/events/filteredSearch';
}
