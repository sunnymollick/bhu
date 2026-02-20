<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Models\MyCareer;

class MyCareerController extends Controller
{
    /**
     * Update career objective
     */
    public function updateObjective(Request $request)
    {
        $request->validate([
            'career_objective' => 'required|string|max:5000'
        ]);

        $user = Auth::user();
        $career = MyCareer::getOrCreateForUser($user->id);
        $career->career_objective = $request->career_objective;
        $career->save();

        return response()->json([
            'success' => true,
            'message' => 'Career objective updated successfully!',
            'career_objective' => $career->career_objective
        ]);
    }

    /**
     * Add education entry
     */
    public function addEducation(Request $request)
    {
        $request->validate([
            'degree' => 'required|string|max:255',
            'institution' => 'required|string|max:255',
            'location' => 'nullable|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'cgpa' => 'nullable|string|max:50',
            'group' => 'nullable|string|in:Science,Business,Humanities',
            'major' => 'nullable|string|max:255',
            'minor' => 'nullable|string|max:255',
        ]);

        $user = Auth::user();
        $career = MyCareer::getOrCreateForUser($user->id);

        $career->addEducation([
            'degree' => $request->degree,
            'institution' => $request->institution,
            'location' => $request->location,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'cgpa' => $request->cgpa,
            'group' => $request->group,
            'major' => $request->major,
            'minor' => $request->minor,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Education entry added successfully!',
            'education' => $career->education
        ]);
    }

    /**
     * Update education entry
     */
    public function updateEducation(Request $request)
    {
        $request->validate([
            'id' => 'required|string',
            'degree' => 'required|string|max:255',
            'institution' => 'required|string|max:255',
            'location' => 'nullable|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'cgpa' => 'nullable|string|max:50',
            'group' => 'nullable|string|in:Science,Business,Humanities',
            'major' => 'nullable|string|max:255',
            'minor' => 'nullable|string|max:255',
        ]);

        $user = Auth::user();
        $career = MyCareer::getOrCreateForUser($user->id);

        $career->updateEducation($request->id, [
            'degree' => $request->degree,
            'institution' => $request->institution,
            'location' => $request->location,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'cgpa' => $request->cgpa,
            'group' => $request->group,
            'major' => $request->major,
            'minor' => $request->minor,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Education entry updated successfully!',
            'education' => $career->education
        ]);
    }

    /**
     * Delete education entry
     */
    public function deleteEducation(Request $request)
    {
        $request->validate([
            'id' => 'required|string'
        ]);

        $user = Auth::user();
        $career = MyCareer::getOrCreateForUser($user->id);
        $career->deleteEducation($request->id);

        return response()->json([
            'success' => true,
            'message' => 'Education entry deleted successfully!'
        ]);
    }

    /**
     * Add work experience entry
     */
    public function addWorkExperience(Request $request)
    {
        $request->validate([
            'position' => 'required|string|max:255',
            'company' => 'required|string|max:255',
            'location' => 'nullable|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'description' => 'nullable|string|max:5000',
        ]);

        $user = Auth::user();
        $career = MyCareer::getOrCreateForUser($user->id);

        $career->addWorkExperience([
            'position' => $request->position,
            'company' => $request->company,
            'location' => $request->location,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'description' => $request->description,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Work experience added successfully!',
            'work_experience' => $career->work_experience
        ]);
    }

    /**
     * Update work experience entry
     */
    public function updateWorkExperience(Request $request)
    {
        $request->validate([
            'id' => 'required|string',
            'position' => 'required|string|max:255',
            'company' => 'required|string|max:255',
            'location' => 'nullable|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'description' => 'nullable|string|max:5000',
        ]);

        $user = Auth::user();
        $career = MyCareer::getOrCreateForUser($user->id);

        $career->updateWorkExperience($request->id, [
            'position' => $request->position,
            'company' => $request->company,
            'location' => $request->location,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'description' => $request->description,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Work experience updated successfully!',
            'work_experience' => $career->work_experience
        ]);
    }

    /**
     * Delete work experience entry
     */
    public function deleteWorkExperience(Request $request)
    {
        $request->validate([
            'id' => 'required|string'
        ]);

        $user = Auth::user();
        $career = MyCareer::getOrCreateForUser($user->id);
        $career->deleteWorkExperience($request->id);

        return response()->json([
            'success' => true,
            'message' => 'Work experience deleted successfully!'
        ]);
    }

    /**
     * Add skill
     */
    public function addSkill(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'proficiency_level' => 'required|string|max:100',
            'proficiency_percentage' => 'required|integer|min:0|max:100',
        ]);

        $user = Auth::user();
        $career = MyCareer::getOrCreateForUser($user->id);

        $career->addSkill([
            'name' => $request->name,
            'proficiency_level' => $request->proficiency_level,
            'proficiency_percentage' => $request->proficiency_percentage,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Skill added successfully!',
            'skills' => $career->skills
        ]);
    }

    /**
     * Update skill
     */
    public function updateSkill(Request $request)
    {
        $request->validate([
            'id' => 'required|string',
            'name' => 'required|string|max:255',
            'proficiency_level' => 'required|string|max:100',
            'proficiency_percentage' => 'required|integer|min:0|max:100',
        ]);

        $user = Auth::user();
        $career = MyCareer::getOrCreateForUser($user->id);

        $career->updateSkill($request->id, [
            'name' => $request->name,
            'proficiency_level' => $request->proficiency_level,
            'proficiency_percentage' => $request->proficiency_percentage,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Skill updated successfully!',
            'skills' => $career->skills
        ]);
    }

    /**
     * Delete skill
     */
    public function deleteSkill(Request $request)
    {
        $request->validate([
            'id' => 'required|string'
        ]);

        $user = Auth::user();
        $career = MyCareer::getOrCreateForUser($user->id);
        $career->deleteSkill($request->id);

        return response()->json([
            'success' => true,
            'message' => 'Skill deleted successfully!'
        ]);
    }

    /**
     * Add project
     */
    public function addProject(Request $request)
    {
        try {
            $request->validate([
                'title' => 'required|string|max:255',
                'start_date' => 'nullable|date',
                'end_date' => 'nullable|date|after_or_equal:start_date',
                'link' => 'nullable|url|max:500',
                'description' => 'nullable|string|max:5000',
                'technologies' => 'nullable|array',
            ]);

            $user = Auth::user();
            $career = MyCareer::getOrCreateForUser($user->id);

            $career->addProject([
                'title' => $request->title,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'link' => $request->link,
                'description' => $request->description,
                'technologies' => $request->technologies ?? [],
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Project added successfully!',
                'projects' => $career->projects
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            Log::error('Add project error: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Error: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Update project
     */
    public function updateProject(Request $request)
    {
        try {
            $request->validate([
                'id' => 'required|string',
                'title' => 'required|string|max:255',
                'start_date' => 'nullable|date',
                'end_date' => 'nullable|date|after_or_equal:start_date',
                'link' => 'nullable|url|max:500',
                'description' => 'nullable|string|max:5000',
                'technologies' => 'nullable|array',
            ]);

            $user = Auth::user();
            $career = MyCareer::getOrCreateForUser($user->id);

            $career->updateProject($request->id, [
                'title' => $request->title,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'link' => $request->link,
                'description' => $request->description,
                'technologies' => $request->technologies ?? [],
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Project updated successfully!',
                'projects' => $career->projects
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            Log::error('Update project error: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Error: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Delete project
     */
    public function deleteProject(Request $request)
    {
        $request->validate([
            'id' => 'required|string'
        ]);

        $user = Auth::user();
        $career = MyCareer::getOrCreateForUser($user->id);
        $career->deleteProject($request->id);

        return response()->json([
            'success' => true,
            'message' => 'Project deleted successfully!'
        ]);
    }

    /**
     * Add certification
     */
    public function addCertification(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'issuing_organization' => 'required|string|max:255',
                'issue_date' => 'nullable|date',
                'expiry_date' => 'nullable|date|after_or_equal:issue_date',
                'credential_id' => 'nullable|string|max:255',
                'credential_url' => 'nullable|url|max:500',
            ]);

            $user = Auth::user();
            $career = MyCareer::getOrCreateForUser($user->id);

            $career->addCertification([
                'name' => $request->name,
                'issuing_organization' => $request->issuing_organization,
                'issue_date' => $request->issue_date,
                'expiry_date' => $request->expiry_date,
                'credential_id' => $request->credential_id,
                'credential_url' => $request->credential_url,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Certification added successfully!',
                'certifications' => $career->certifications
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            Log::error('Add certification error: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Error: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Update certification
     */
    public function updateCertification(Request $request)
    {
        try {
            $request->validate([
                'id' => 'required|string',
                'name' => 'required|string|max:255',
                'issuing_organization' => 'required|string|max:255',
                'issue_date' => 'nullable|date',
                'expiry_date' => 'nullable|date|after_or_equal:issue_date',
                'credential_id' => 'nullable|string|max:255',
                'credential_url' => 'nullable|url|max:500',
            ]);

            $user = Auth::user();
            $career = MyCareer::getOrCreateForUser($user->id);

            $career->updateCertification($request->id, [
                'name' => $request->name,
                'issuing_organization' => $request->issuing_organization,
                'issue_date' => $request->issue_date,
                'expiry_date' => $request->expiry_date,
                'credential_id' => $request->credential_id,
                'credential_url' => $request->credential_url,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Certification updated successfully!',
                'certifications' => $career->certifications
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            Log::error('Update certification error: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Error: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Delete certification
     */
    public function deleteCertification(Request $request)
    {
        $request->validate([
            'id' => 'required|string'
        ]);

        $user = Auth::user();
        $career = MyCareer::getOrCreateForUser($user->id);
        $career->deleteCertification($request->id);

        return response()->json([
            'success' => true,
            'message' => 'Certification deleted successfully!'
        ]);
    }

    /**
     * Add language
     */
    public function addLanguage(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'proficiency_level' => 'required|string|max:100',
            ]);

            $user = Auth::user();
            $career = MyCareer::getOrCreateForUser($user->id);

            $career->addLanguage([
                'name' => $request->name,
                'proficiency_level' => $request->proficiency_level,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Language added successfully!',
                'languages' => $career->languages
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            Log::error('Add language error: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Error: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Update language
     */
    public function updateLanguage(Request $request)
    {
        try {
            $request->validate([
                'id' => 'required|string',
                'name' => 'required|string|max:255',
                'proficiency_level' => 'required|string|max:100',
            ]);

            $user = Auth::user();
            $career = MyCareer::getOrCreateForUser($user->id);

            $career->updateLanguage($request->id, [
                'name' => $request->name,
                'proficiency_level' => $request->proficiency_level,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Language updated successfully!',
                'languages' => $career->languages
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            Log::error('Update language error: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Error: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Delete language
     */
    public function deleteLanguage(Request $request)
    {
        $request->validate([
            'id' => 'required|string'
        ]);

        $user = Auth::user();
        $career = MyCareer::getOrCreateForUser($user->id);
        $career->deleteLanguage($request->id);

        return response()->json([
            'success' => true,
            'message' => 'Language deleted successfully!'
        ]);
    }

    /**
     * Add professional link
     */
    public function addProfessionalLink(Request $request)
    {
        try {
            $request->validate([
                'platform' => 'required|string|max:255',
                'url' => 'required|url|max:500',
                'icon' => 'nullable|string|max:100',
            ]);

            $user = Auth::user();
            $career = MyCareer::getOrCreateForUser($user->id);

            $career->addProfessionalLink([
                'platform' => $request->platform,
                'url' => $request->url,
                'icon' => $request->icon ?? 'fas fa-link',
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Professional link added successfully!',
                'professional_links' => $career->professional_links
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            Log::error('Error adding professional link: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'An error occurred while adding the professional link. Please try again.'
            ], 500);
        }
    }

    /**
     * Update professional link
     */
    public function updateProfessionalLink(Request $request)
    {
        try {
            $request->validate([
                'id' => 'required|string',
                'platform' => 'required|string|max:255',
                'url' => 'required|url|max:500',
                'icon' => 'nullable|string|max:100',
            ]);

            $user = Auth::user();
            $career = MyCareer::getOrCreateForUser($user->id);

            $career->updateProfessionalLink($request->id, [
                'platform' => $request->platform,
                'url' => $request->url,
                'icon' => $request->icon ?? 'fas fa-link',
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Professional link updated successfully!',
                'professional_links' => $career->professional_links
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            Log::error('Error updating professional link: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'An error occurred while updating the professional link. Please try again.'
            ], 500);
        }
    }

    /**
     * Delete professional link
     */
    public function deleteProfessionalLink(Request $request)
    {
        try {
            $request->validate([
                'id' => 'required|string'
            ]);

            $user = Auth::user();
            $career = MyCareer::getOrCreateForUser($user->id);
            $career->deleteProfessionalLink($request->id);

            return response()->json([
                'success' => true,
                'message' => 'Professional link deleted successfully!'
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            Log::error('Error deleting professional link: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'An error occurred while deleting the professional link. Please try again.'
            ], 500);
        }
    }
}
