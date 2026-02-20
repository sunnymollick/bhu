<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MyCareer extends Model
{
    use HasFactory;

    protected $table = 'my_career';

    protected $fillable = [
        'user_id',
        'career_objective',
        'education',
        'work_experience',
        'skills',
        'projects',
        'certifications',
        'languages',
        'professional_links',
    ];

    protected $casts = [
        'education' => 'array',
        'work_experience' => 'array',
        'skills' => 'array',
        'projects' => 'array',
        'certifications' => 'array',
        'languages' => 'array',
        'professional_links' => 'array',
    ];

    /**
     * Get the user that owns the career profile
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get or create career profile for user
     */
    public static function getOrCreateForUser($userId)
    {
        return static::firstOrCreate(
            ['user_id' => $userId],
            [
                'education' => [],
                'work_experience' => [],
                'skills' => [],
                'projects' => [],
                'certifications' => [],
                'languages' => [],
                'professional_links' => [],
            ]
        );
    }

    /**
     * Add education entry
     */
    public function addEducation($data)
    {
        $education = $this->education ?? [];
        $education[] = array_merge($data, ['id' => uniqid()]);
        $this->education = $education;
        $this->save();
        return $this;
    }

    /**
     * Update education entry
     */
    public function updateEducation($entryId, $data)
    {
        $education = $this->education ?? [];
        foreach ($education as $key => $entry) {
            if ($entry['id'] === $entryId) {
                $education[$key] = array_merge($entry, $data);
                break;
            }
        }
        $this->education = $education;
        $this->save();
        return $this;
    }

    /**
     * Delete education entry
     */
    public function deleteEducation($entryId)
    {
        $education = $this->education ?? [];
        $this->education = array_values(array_filter($education, function($entry) use ($entryId) {
            return $entry['id'] !== $entryId;
        }));
        $this->save();
        return $this;
    }

    /**
     * Add work experience entry
     */
    public function addWorkExperience($data)
    {
        $workExperience = $this->work_experience ?? [];
        $workExperience[] = array_merge($data, ['id' => uniqid()]);
        $this->work_experience = $workExperience;
        $this->save();
        return $this;
    }

    /**
     * Update work experience entry
     */
    public function updateWorkExperience($entryId, $data)
    {
        $workExperience = $this->work_experience ?? [];
        foreach ($workExperience as $key => $entry) {
            if ($entry['id'] === $entryId) {
                $workExperience[$key] = array_merge($entry, $data);
                break;
            }
        }
        $this->work_experience = $workExperience;
        $this->save();
        return $this;
    }

    /**
     * Delete work experience entry
     */
    public function deleteWorkExperience($entryId)
    {
        $workExperience = $this->work_experience ?? [];
        $this->work_experience = array_values(array_filter($workExperience, function($entry) use ($entryId) {
            return $entry['id'] !== $entryId;
        }));
        $this->save();
        return $this;
    }

    /**
     * Add skill
     */
    public function addSkill($data)
    {
        $skills = $this->skills ?? [];
        $skills[] = array_merge($data, ['id' => uniqid()]);
        $this->skills = $skills;
        $this->save();
        return $this;
    }

    /**
     * Update skill
     */
    public function updateSkill($entryId, $data)
    {
        $skills = $this->skills ?? [];
        foreach ($skills as $key => $entry) {
            if ($entry['id'] === $entryId) {
                $skills[$key] = array_merge($entry, $data);
                break;
            }
        }
        $this->skills = $skills;
        $this->save();
        return $this;
    }

    /**
     * Delete skill
     */
    public function deleteSkill($entryId)
    {
        $skills = $this->skills ?? [];
        $this->skills = array_values(array_filter($skills, function($entry) use ($entryId) {
            return $entry['id'] !== $entryId;
        }));
        $this->save();
        return $this;
    }

    /**
     * Add project
     */
    public function addProject($data)
    {
        $projects = $this->projects ?? [];
        $projects[] = array_merge($data, ['id' => uniqid()]);
        $this->projects = $projects;
        $this->save();
        return $this;
    }

    /**
     * Update project
     */
    public function updateProject($entryId, $data)
    {
        $projects = $this->projects ?? [];
        foreach ($projects as $key => $entry) {
            if ($entry['id'] === $entryId) {
                $projects[$key] = array_merge($entry, $data);
                break;
            }
        }
        $this->projects = $projects;
        $this->save();
        return $this;
    }

    /**
     * Delete project
     */
    public function deleteProject($entryId)
    {
        $projects = $this->projects ?? [];
        $this->projects = array_values(array_filter($projects, function($entry) use ($entryId) {
            return $entry['id'] !== $entryId;
        }));
        $this->save();
        return $this;
    }

    /**
     * Add certification
     */
    public function addCertification($data)
    {
        $certifications = $this->certifications ?? [];
        $certifications[] = array_merge($data, ['id' => uniqid()]);
        $this->certifications = $certifications;
        $this->save();
        return $this;
    }

    /**
     * Update certification
     */
    public function updateCertification($entryId, $data)
    {
        $certifications = $this->certifications ?? [];
        foreach ($certifications as $key => $entry) {
            if ($entry['id'] === $entryId) {
                $certifications[$key] = array_merge($entry, $data);
                break;
            }
        }
        $this->certifications = $certifications;
        $this->save();
        return $this;
    }

    /**
     * Delete certification
     */
    public function deleteCertification($entryId)
    {
        $certifications = $this->certifications ?? [];
        $this->certifications = array_values(array_filter($certifications, function($entry) use ($entryId) {
            return $entry['id'] !== $entryId;
        }));
        $this->save();
        return $this;
    }

    /**
     * Add language
     */
    public function addLanguage($data)
    {
        $languages = $this->languages ?? [];
        $languages[] = array_merge($data, ['id' => uniqid()]);
        $this->languages = $languages;
        $this->save();
        return $this;
    }

    /**
     * Update language
     */
    public function updateLanguage($entryId, $data)
    {
        $languages = $this->languages ?? [];
        foreach ($languages as $key => $entry) {
            if ($entry['id'] === $entryId) {
                $languages[$key] = array_merge($entry, $data);
                break;
            }
        }
        $this->languages = $languages;
        $this->save();
        return $this;
    }

    /**
     * Delete language
     */
    public function deleteLanguage($entryId)
    {
        $languages = $this->languages ?? [];
        $this->languages = array_values(array_filter($languages, function($entry) use ($entryId) {
            return $entry['id'] !== $entryId;
        }));
        $this->save();
        return $this;
    }

    /**
     * Add professional link
     */
    public function addProfessionalLink($data)
    {
        $links = $this->professional_links ?? [];
        $links[] = array_merge($data, ['id' => uniqid()]);
        $this->professional_links = $links;
        $this->save();
        return $this;
    }

    /**
     * Update professional link
     */
    public function updateProfessionalLink($entryId, $data)
    {
        $links = $this->professional_links ?? [];
        foreach ($links as $key => $entry) {
            if ($entry['id'] === $entryId) {
                $links[$key] = array_merge($entry, $data);
                break;
            }
        }
        $this->professional_links = $links;
        $this->save();
        return $this;
    }

    /**
     * Delete professional link
     */
    public function deleteProfessionalLink($entryId)
    {
        $links = $this->professional_links ?? [];
        $this->professional_links = array_values(array_filter($links, function($entry) use ($entryId) {
            return $entry['id'] !== $entryId;
        }));
        $this->save();
        return $this;
    }
}
