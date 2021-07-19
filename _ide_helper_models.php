<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\File
 *
 * @property int $id
 * @property string $title
 * @property string $link
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\FileFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|File newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|File newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|File query()
 * @method static \Illuminate\Database\Eloquent\Builder|File whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|File whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|File whereLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|File whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|File whereUpdatedAt($value)
 */
	class File extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Meeting
 *
 * @property int $id
 * @property string $name_of_the_meeting
 * @property string $type_of_meeting
 * @property mixed $start_date
 * @property string $end_date
 * @property string $start_time
 * @property string $end_time
 * @property string|null $participants_arrival_date
 * @property string|null $secretariat_arrival_date
 * @property string|null $participants_departure_date
 * @property string|null $secretariat_departure_date
 * @property string|null $description
 * @property int $is_breakout_room_required
 * @property int $is_recording_required
 * @property int $is_attendance_report_required
 * @property int $is_members_airfare_required
 * @property int $is_secretariat_airfare_required
 * @property string|null $proposed_funding
 * @property string|null $venue
 * @property string|null $perdiem_rate
 * @property string|null $num_of_participants
 * @property string $status
 * @property int $user_id
 * @property int $project_id
 * @property int|null $programme_id
 * @property int|null $partner_id
 * @property int|null $file_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\File[] $files
 * @property-read int|null $files_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Participant[] $participants
 * @property-read int|null $participants_count
 * @property-read \App\Models\Programme|null $programme
 * @property-read \App\Models\Project $project
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Recording[] $recordings
 * @property-read int|null $recordings_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Resource[] $resources
 * @property-read int|null $resources_count
 * @property-read \App\Models\User $user
 * @method static \Database\Factories\MeetingFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Meeting newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Meeting newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Meeting query()
 * @method static \Illuminate\Database\Eloquent\Builder|Meeting whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Meeting whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Meeting whereEndDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Meeting whereEndTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Meeting whereFileId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Meeting whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Meeting whereIsAttendanceReportRequired($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Meeting whereIsBreakoutRoomRequired($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Meeting whereIsMembersAirfareRequired($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Meeting whereIsRecordingRequired($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Meeting whereIsSecretariatAirfareRequired($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Meeting whereNameOfTheMeeting($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Meeting whereNumOfParticipants($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Meeting whereParticipantsArrivalDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Meeting whereParticipantsDepartureDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Meeting wherePartnerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Meeting wherePerdiemRate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Meeting whereProgrammeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Meeting whereProjectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Meeting whereProposedFunding($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Meeting whereSecretariatArrivalDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Meeting whereSecretariatDepartureDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Meeting whereStartDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Meeting whereStartTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Meeting whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Meeting whereTypeOfMeeting($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Meeting whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Meeting whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Meeting whereVenue($value)
 */
	class Meeting extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Participant
 *
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property string $email
 * @property string $registration_date
 * @property string $country_code
 * @property string $country
 * @property string|null $tel
 * @property string $organization
 * @property string|null $job_title
 * @property int $meeting_id
 * @property int|null $user_id
 * @property int|null $file_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\File[] $files
 * @property-read int|null $files_count
 * @property-read \App\Models\Meeting $meeting
 * @method static \Database\Factories\ParticipantFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Participant newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Participant newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Participant query()
 * @method static \Illuminate\Database\Eloquent\Builder|Participant whereCountry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Participant whereCountryCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Participant whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Participant whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Participant whereFileId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Participant whereFirstName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Participant whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Participant whereJobTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Participant whereLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Participant whereMeetingId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Participant whereOrganization($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Participant whereRegistrationDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Participant whereTel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Participant whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Participant whereUserId($value)
 */
	class Participant extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Partner
 *
 * @property int $id
 * @property string $title
 * @property string $contact_person
 * @property string $contact_details
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\PartnerFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Partner newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Partner newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Partner query()
 * @method static \Illuminate\Database\Eloquent\Builder|Partner whereContactDetails($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Partner whereContactPerson($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Partner whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Partner whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Partner whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Partner whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Partner whereUserId($value)
 */
	class Partner extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Programme
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property int $manager_id
 * @property int $user_id
 * @property int|null $file_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\File[] $files
 * @property-read int|null $files_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Meeting[] $meetings
 * @property-read int|null $meetings_count
 * @property-read \App\Models\User $programme_officer
 * @method static \Database\Factories\ProgrammeFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Programme newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Programme newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Programme query()
 * @method static \Illuminate\Database\Eloquent\Builder|Programme whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Programme whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Programme whereFileId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Programme whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Programme whereManagerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Programme whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Programme whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Programme whereUserId($value)
 */
	class Programme extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Project
 *
 * @property int $id
 * @property string $title
 * @property string $objective
 * @property int $officer_id
 * @property int $user_id
 * @property int $programme_id
 * @property int|null $file_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\File[] $files
 * @property-read int|null $files_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Meeting[] $meetings
 * @property-read int|null $meetings_count
 * @property-read \App\Models\Programme $programme
 * @property-read \App\Models\User $user
 * @method static \Database\Factories\ProjectFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Project newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Project newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Project query()
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereFileId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereObjective($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereOfficerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereProgrammeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereUserId($value)
 */
	class Project extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Recording
 *
 * @property int $id
 * @property string $title
 * @property string|null $credentials
 * @property string $url_recording
 * @property int $user_id
 * @property int $meeting_id
 * @property int $file_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Meeting $meetings
 * @property-read \App\Models\User $users
 * @method static \Database\Factories\RecordingFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Recording newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Recording newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Recording query()
 * @method static \Illuminate\Database\Eloquent\Builder|Recording whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Recording whereCredentials($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Recording whereFileId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Recording whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Recording whereMeetingId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Recording whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Recording whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Recording whereUrlRecording($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Recording whereUserId($value)
 */
	class Recording extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Report
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\ReportFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Report newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Report newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Report query()
 * @method static \Illuminate\Database\Eloquent\Builder|Report whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Report whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Report whereUpdatedAt($value)
 */
	class Report extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Resource
 *
 * @property int $id
 * @property string $title
 * @property string|null $description
 * @property int $user_id
 * @property int|null $file_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\File[] $files
 * @property-read int|null $files_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Meeting[] $meetings
 * @property-read int|null $meetings_count
 * @method static \Database\Factories\ResourceFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Resource newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Resource newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Resource query()
 * @method static \Illuminate\Database\Eloquent\Builder|Resource whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Resource whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Resource whereFileId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Resource whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Resource whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Resource whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Resource whereUserId($value)
 */
	class Resource extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Support
 *
 * @property int $id
 * @property string $title
 * @property string $status
 * @property string $description
 * @property int $user_id
 * @property int|null $file_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\File[] $files
 * @property-read int|null $files_count
 * @property-read \App\Models\User $user
 * @method static \Database\Factories\SupportFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Support newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Support newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Support query()
 * @method static \Illuminate\Database\Eloquent\Builder|Support whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Support whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Support whereFileId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Support whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Support whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Support whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Support whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Support whereUserId($value)
 */
	class Support extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property int|null $file_id
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\File[] $file
 * @property-read int|null $file_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Meeting[] $meetings
 * @property-read int|null $meetings_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Permission[] $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Programme[] $programme
 * @property-read int|null $programme_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Project[] $projects
 * @property-read int|null $projects_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Recording[] $recordings
 * @property-read int|null $recordings_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Resource[] $resources
 * @property-read int|null $resources_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Role[] $roles
 * @property-read int|null $roles_count
 * @method static \Database\Factories\UserFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User permission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User role($roles, $guard = null)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereFileId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 */
	class User extends \Eloquent implements \Illuminate\Contracts\Auth\MustVerifyEmail {}
}

