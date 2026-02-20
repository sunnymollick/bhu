<?php $__env->startSection('stylesheet'); ?>
<link rel="stylesheet" href="<?php echo e(asset('backend/plugins/summernote/summernote-bs4.css')); ?>">
<style>
    :root {
        --career-gradient: linear-gradient(to right, #dc8a45, #5c5555);
        --success-gradient: linear-gradient(135deg, #27ae60, #229954);
    }

    .career-hero {
        background: var(--career-gradient);
        padding: 2rem 0;
        margin-bottom: 2rem;
        border-radius: 20px;
        color: white;
        box-shadow: 0 10px 40px rgba(220, 138, 69, 0.3);
    }

    .career-section-card {
        background: #fff;
        border-radius: 20px;
        box-shadow: 0 10px 40px rgba(0,0,0,0.08);
        padding: 2rem;
        margin-bottom: 2rem;
    }

    .section-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 1.5rem;
        padding-bottom: 1rem;
        border-bottom: 3px solid #f0f0f0;
    }

    .section-title {
        font-size: 1.5rem;
        font-weight: 700;
        color: #2c3e50;
        display: flex;
        align-items: center;
        gap: 10px;
        margin: 0;
    }

    .section-title .icon {
        width: 45px;
        height: 45px;
        background: var(--career-gradient);
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
    }

    .btn-add-item {
        background: var(--career-gradient);
        border: none;
        color: #fff;
        padding: 0.6rem 1.5rem;
        border-radius: 50px;
        font-weight: 600;
        box-shadow: 0 5px 15px rgba(220, 138, 69, 0.25);
    }

    .btn-add-item:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(220, 138, 69, 0.35);
        color: #fff;
    }

    .item-card {
        background: linear-gradient(135deg, rgba(220, 138, 69, 0.03) 0%, rgba(92, 85, 85, 0.03) 100%);
        border-radius: 15px;
        padding: 1.5rem;
        margin-bottom: 1rem;
        border-left: 4px solid #dc8a45;
    }

    .item-header {
        display: flex;
        justify-content: space-between;
        align-items: start;
        margin-bottom: 0.75rem;
    }

    .item-title {
        font-size: 1.2rem;
        font-weight: 700;
        color: #2c3e50;
    }

    .item-subtitle {
        color: #dc8a45;
        font-weight: 600;
    }

    .item-meta {
        color: #7f8c8d;
        font-size: 0.9rem;
        display: flex;
        gap: 15px;
    }

    .btn-icon {
        width: 38px;
        height: 38px;
        border-radius: 10px;
        border: none;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 0.9rem;
        transition: all 0.3s;
        cursor: pointer;
        margin-bottom: 8px;
    }

    .btn-icon:last-child {
        margin-bottom: 0;
    }

    .btn-edit {
        background: linear-gradient(135deg, #3498db 0%, #2980b9 100%);
        color: white;
        box-shadow: 0 3px 10px rgba(52, 152, 219, 0.3);
    }

    .btn-edit:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(52, 152, 219, 0.4);
    }

    .btn-delete {
        background: linear-gradient(135deg, #e74c3c 0%, #c0392b 100%);
        color: white;
        box-shadow: 0 3px 10px rgba(231, 76, 60, 0.3);
    }

    .btn-delete:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(231, 76, 60, 0.4);
    }

    .item-actions {
        display: flex;
        gap: 8px;
    }

    .empty-state {
        text-align: center;
        padding: 3rem;
        color: #7f8c8d;
    }

    .empty-state i {
        font-size: 4rem;
        opacity: 0.3;
    }

    .form-label {
        font-weight: 600;
        color: #2c3e50;
    }

    .form-control {
        border: 2px solid #ecf0f1;
        border-radius: 10px;
        padding: 0.65rem 1rem;
    }

    .form-control:focus {
        border-color: #dc8a45;
        box-shadow: 0 0 0 0.2rem rgba(220, 138, 69, 0.15);
    }

    .skill-tag {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: var(--career-gradient);
        color: white;
        padding: 0.5rem 1rem;
        border-radius: 50px;
        margin: 0.25rem;
    }

    .proficiency-bar {
        height: 8px;
        background: #ecf0f1;
        border-radius: 10px;
        overflow: hidden;
        margin-top: 0.5rem;
    }

    .proficiency-fill {
        height: 100%;
        background: var(--success-gradient);
    }

    .social-icon {
        width: 55px;
        height: 55px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 1.5rem;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.15);
        transition: all 0.3s;
    }

    .social-icon:hover {
        transform: translateY(-3px);
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.2);
    }

    .social-icon.linkedin { background: linear-gradient(135deg, #0077b5 0%, #005885 100%); }
    .social-icon.github { background: linear-gradient(135deg, #333 0%, #1a1a1a 100%); }
    .social-icon.portfolio { background: var(--career-gradient); }
    .social-icon.twitter { background: linear-gradient(135deg, #1DA1F2 0%, #0d8bd9 100%); }
    .social-icon.facebook { background: linear-gradient(135deg, #1877f2 0%, #0c5dca 100%); }
    .social-icon.instagram { background: linear-gradient(135deg, #e1306c 0%, #c13584 100%); }
    .social-icon.stack-overflow { background: linear-gradient(135deg, #f48024 0%, #d46b1a 100%); }
    .social-icon.medium { background: linear-gradient(135deg, #00ab6c 0%, #008a56 100%); }
    .social-icon.youtube { background: linear-gradient(135deg, #FF0000 0%, #cc0000 100%); }
    .social-icon.behance { background: linear-gradient(135deg, #1769ff 0%, #0d4fc7 100%); }
    .social-icon.dribbble { background: linear-gradient(135deg, #ea4c89 0%, #d63a73 100%); }
    .social-icon.gitlab { background: linear-gradient(135deg, #fc6d26 0%, #e24329 100%); }
    .social-icon.bitbucket { background: linear-gradient(135deg, #0052cc 0%, #0041a3 100%); }
    .social-icon.codepen { background: linear-gradient(135deg, #000 0%, #1a1a1a 100%); }
    .social-icon.discord { background: linear-gradient(135deg, #5865F2 0%, #4752c4 100%); }
    .social-icon.telegram { background: linear-gradient(135deg, #0088cc 0%, #006ba3 100%); }
    .social-icon.whatsapp { background: linear-gradient(135deg, #25d366 0%, #1da851 100%); }
    .social-icon.reddit { background: linear-gradient(135deg, #ff4500 0%, #cc3700 100%); }
    .social-icon.tiktok { background: linear-gradient(135deg, #000 0%, #1a1a1a 100%); }
    .social-icon.twitch { background: linear-gradient(135deg, #9146ff 0%, #7634d9 100%); }
    .social-icon.other { background: linear-gradient(to right, #dc8a45, #5c5555); }
    .social-icon.portfolio-website { background: var(--career-gradient); }

    .social-link-content {
        flex: 1;
        margin-left: 15px;
    }

    .social-link-actions {
        display: flex;
        gap: 8px;
        margin-left: 15px;
    }

    /* See More / Read More Styles */
    .text-truncated {
        position: relative;
        max-height: 120px;
        overflow: hidden;
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        word-wrap: break-word;
        word-break: break-word;
        white-space: normal;
        line-height: 1.5;
        transition: all 0.3s ease-in-out;
        margin-bottom: 0.5rem;
        text-align: justify;
    }

    .text-truncated.expanded {
        max-height: none !important;
        -webkit-line-clamp: unset;
        overflow: visible;
        display: block;
        transition: all 0.3s ease-in-out;
    }

    .see-more-btn {
        background: none;
        border: none;
        color: #dc8a45;
        padding: 0.25rem 0;
        font-weight: 600;
        cursor: pointer;
        text-decoration: none;
        outline: none !important;
        box-shadow: none !important;
    }

    .see-more-btn:hover {
        color: #5c5555;
        text-decoration: underline;
        outline: none;
    }

    .see-more-btn:focus {
        outline: none !important;
        box-shadow: none !important;
        border: none !important;
    }

    .see-more-btn:focus {
        outline: none !important;
        box-shadow: none !important;
    }

    .description-container {
        margin-top: 1rem;
    }

    .description-container p {
        margin-bottom: 0.5rem;
    }
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>My Career Hub</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>">Home</a></li>
                    <li class="breadcrumb-item active">My Career</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="container-fluid">
        <!-- Hero -->
        <div class="career-hero text-center">
            <h1><i class="fas fa-graduation-cap mr-2"></i>My Career Portfolio</h1>
            <p>Build your professional profile and showcase your skills</p>
        </div>

        <!-- Career Summary/Objective -->
        <div class="career-section-card">
            <div class="section-header">
                <h3 class="section-title">
                    <span class="icon"><i class="fas fa-bullseye"></i></span>
                    Career Objective
                </h3>
                <button class="btn btn-add-item" data-toggle="collapse" data-target="#objectiveForm">
                    <i class="fas fa-edit mr-2"></i>Edit
                </button>
            </div>
            <div id="objectiveContent">
                <?php if($career->career_objective): ?>
                    <p id="objectiveText" class="text-truncated"><?php echo e($career->career_objective); ?></p>
                    <?php if(strlen($career->career_objective) > 200): ?>
                        <button class="see-more-btn" onclick="toggleObjective()"><span id="objectiveToggleText">See More</span></button>
                    <?php endif; ?>
                <?php else: ?>
                    <p class="text-muted">Write a brief summary of your career goals and objectives...</p>
                <?php endif; ?>
            </div>
            <div class="collapse mt-3" id="objectiveForm">
                <textarea id="careerObjectiveText" class="form-control" rows="4" placeholder="Enter your career objective..."><?php echo e($career->career_objective); ?></textarea>
                <div class="mt-3">
                    <button class="btn btn-add-item" id="saveObjectiveBtn"><i class="fas fa-save mr-2"></i>Save</button>
                    <button class="btn btn-secondary ml-2" data-toggle="collapse" data-target="#objectiveForm">Cancel</button>
                </div>
            </div>
        </div>

        <!-- Education -->
<div class="career-section-card">
    <div class="section-header">
        <h3 class="section-title">
            <span class="icon"><i class="fas fa-graduation-cap"></i></span>
            Education
        </h3>
        <button class="btn btn-add-item" data-toggle="modal" data-target="#addEducationModal">
            <i class="fas fa-plus mr-2"></i>Add Education
        </button>
    </div>
    <div id="educationList">
        <?php if($career->education && count($career->education) > 0): ?>
            <?php $__currentLoopData = $career->education; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $edu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="item-card" data-id="<?php echo e($edu['id']); ?>">
                    <div class="item-header">
                        <div>
                            <h5 class="item-title"><?php echo e($edu['degree']); ?></h5>
                            <p class="item-subtitle mb-1"><?php echo e($edu['institution']); ?></p>
                            <div class="item-meta">
                                <span><i class="fas fa-calendar mr-1"></i><?php echo e(date('M Y', strtotime($edu['start_date']))); ?> - <?php echo e($edu['end_date'] ? date('M Y', strtotime($edu['end_date'])) : 'Present'); ?></span>
                                <?php if(!empty($edu['location'])): ?>
                                    <span><i class="fas fa-map-marker-alt mr-1"></i><?php echo e($edu['location']); ?></span>
                                <?php endif; ?>
                                <?php if(!empty($edu['cgpa'])): ?>
                                    <span><i class="fas fa-star mr-1"></i>CGPA: <?php echo e($edu['cgpa']); ?></span>
                                <?php endif; ?>
                                <?php if(!empty($edu['group'])): ?>
                                    <span><i class="fas fa-book mr-1"></i><?php echo e($edu['group']); ?></span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="item-actions d-flex gap-2">
                            <button class="btn-icon btn-edit" onclick="editEducation('<?php echo e($edu['id']); ?>')"><i class="fas fa-edit"></i></button>
                            <button class="btn-icon btn-delete" onclick="deleteEducation('<?php echo e($edu['id']); ?>')"><i class="fas fa-trash"></i></button>
                        </div>
                    </div>
                    <?php if(!empty($edu['major']) || !empty($edu['minor'])): ?>
                        <p class="mb-0 mt-2 text-muted">
                            <?php if(!empty($edu['major'])): ?>Major: <?php echo e($edu['major']); ?><?php endif; ?>
                            <?php if(!empty($edu['major']) && !empty($edu['minor'])): ?> | <?php endif; ?>
                            <?php if(!empty($edu['minor'])): ?>Minor: <?php echo e($edu['minor']); ?><?php endif; ?>
                        </p>
                    <?php endif; ?>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php else: ?>
            <div class="empty-state">
                <i class="fas fa-graduation-cap"></i>
                <p>No education entries yet. Click "Add Education" to get started!</p>
            </div>
        <?php endif; ?>
    </div>
</div>

<!-- Education Modal - Add/Edit -->
<div class="modal fade" id="addEducationModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background: linear-gradient(to right, #dc8a45, #5c5555); color: white;">
                <h5 class="modal-title" id="educationModalTitle">
                    <i class="fas fa-graduation-cap mr-2"></i>Add Education
                </h5>
                <button type="button" class="close text-white" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="educationForm">
                    <input type="hidden" id="education_id" name="education_id">
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label class="form-label">Degree/Qualification <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="degree" name="degree" placeholder="e.g., Bachelor of Science in Computer Science" required>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label class="form-label">Institution <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="institution" name="institution" placeholder="e.g., University of Example" required>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label class="form-label">Location</label>
                            <input type="text" class="form-control" id="location" name="location" placeholder="e.g., City, Country">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Start Date <span class="text-danger">*</span></label>
                            <input type="month" class="form-control" id="start_date" name="start_date" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">End Date</label>
                            <input type="month" class="form-control" id="end_date" name="end_date">
                            <small class="text-muted">Leave empty if currently studying</small>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label class="form-label">CGPA/Grade</label>
                            <input type="text" class="form-control" id="cgpa" name="cgpa" placeholder="e.g., 3.85/4.00">
                        </div>
                        <div class="col-md-12 mb-3">
                            <label class="form-label">Group</label>
                            <select class="form-control" id="group" name="group">
                                <option value="">Select Group</option>
                                <option value="Science">Science</option>
                                <option value="Business">Business</option>
                                <option value="Humanities">Humanities</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Major</label>
                            <input type="text" class="form-control" id="major" name="major" placeholder="e.g., Computer Science">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Minor</label>
                            <input type="text" class="form-control" id="minor" name="minor" placeholder="e.g., Mathematics">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-add-item" id="saveEducationBtn">
                    <i class="fas fa-save mr-2"></i>Save Education
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Delete Confirmation Modal for Education -->
<div class="modal fade" id="deleteEducationModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title">
                    <i class="fas fa-exclamation-triangle mr-2"></i>Delete Education
                </h5>
                <button type="button" class="close text-white" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p class="mb-0">Are you sure you want to delete this education entry?</p>
                <p class="text-muted mb-0 mt-2"><small>This action cannot be undone.</small></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger" id="confirmDeleteEducationBtn">
                    <i class="fas fa-trash mr-2"></i>Delete
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Work Experience -->
<div class="career-section-card">
    <div class="section-header">
        <h3 class="section-title">
            <span class="icon"><i class="fas fa-briefcase"></i></span>
            Work Experience
        </h3>
        <button class="btn btn-add-item" data-toggle="modal" data-target="#addExperienceModal">
            <i class="fas fa-plus mr-2"></i>Add Experience
        </button>
    </div>
    <div id="experienceList">
        <?php if($career->work_experience && count($career->work_experience) > 0): ?>
            <?php $__currentLoopData = $career->work_experience; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $exp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="item-card" data-id="<?php echo e($exp['id']); ?>">
                    <div class="item-header">
                        <div>
                            <h5 class="item-title"><?php echo e($exp['position']); ?></h5>
                            <p class="item-subtitle mb-1"><?php echo e($exp['company']); ?></p>
                            <div class="item-meta">
                                <span><i class="fas fa-calendar mr-1"></i><?php echo e(date('M Y', strtotime($exp['start_date']))); ?> - <?php echo e($exp['end_date'] ? date('M Y', strtotime($exp['end_date'])) : 'Present'); ?></span>
                                <?php if(!empty($exp['location'])): ?>
                                    <span><i class="fas fa-map-marker-alt mr-1"></i><?php echo e($exp['location']); ?></span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="item-actions d-flex gap-2">
                            <button class="btn-icon btn-edit" onclick="editWorkExperience('<?php echo e($exp['id']); ?>')"><i class="fas fa-edit"></i></button>
                            <button class="btn-icon btn-delete" onclick="deleteWorkExperience('<?php echo e($exp['id']); ?>')"><i class="fas fa-trash"></i></button>
                        </div>
                    </div>
                    <?php if(!empty($exp['description'])): ?>
                        <div class="description-container">
                            <div id="description-<?php echo e($exp['id']); ?>" class="text-truncated"><?php echo $exp['description']; ?></div>
                            <?php if(strlen(strip_tags($exp['description'])) > 200): ?>
                                <button class="see-more-btn" id="toggle-<?php echo e($exp['id']); ?>" onclick="toggleDescription('<?php echo e($exp['id']); ?>')" >See More</button>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php else: ?>
            <div class="empty-state">
                <i class="fas fa-briefcase"></i>
                <p>No work experience entries yet. Click "Add Experience" to get started!</p>
            </div>
        <?php endif; ?>
    </div>
</div>

<!-- Add/Edit Work Experience Modal -->
<div class="modal fade" id="addExperienceModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header gradient-header">
                <h5 class="modal-title" id="experienceModalTitle">Add Work Experience</h5>
                <button type="button" class="close text-white" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="experienceForm">
                    <input type="hidden" id="experienceId">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="position">Position <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="position" placeholder="e.g., Software Engineer" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="company">Company <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="company" placeholder="e.g., Tech Company Inc." required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exp_location">Location</label>
                        <input type="text" class="form-control" id="exp_location" placeholder="e.g., New York, USA or Remote">
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exp_start_date">Start Date <span class="text-danger">*</span></label>
                                <input type="month" class="form-control" id="exp_start_date" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exp_end_date">End Date</label>
                                <input type="month" class="form-control" id="exp_end_date">
                                <small class="form-text text-muted">Leave blank if currently working</small>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="description">Responsibilities</label>
                        <textarea class="form-control summernote" id="description" rows="4" placeholder="Describe your responsibilities and achievements..."></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" id="saveExperienceBtn">
                    <i class="fas fa-save mr-2"></i>Save Experience
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Delete Work Experience Confirmation Modal -->
<div class="modal fade" id="deleteExperienceModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title">Confirm Delete</h5>
                <button type="button" class="close text-white" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete this work experience entry? This action cannot be undone.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger" id="confirmDeleteExperienceBtn">
                    <i class="fas fa-trash mr-2"></i>Delete
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Skills -->
<div class="career-section-card">
    <div class="section-header">
        <h3 class="section-title">
            <span class="icon"><i class="fas fa-tools"></i></span>
            Skills
        </h3>
        <button class="btn btn-add-item" data-toggle="modal" data-target="#addSkillModal">
            <i class="fas fa-plus mr-2"></i>Add Skill
        </button>
    </div>
    <div id="skillsList">
        <?php if($career->skills && count($career->skills) > 0): ?>
            <div class="row">
                <?php $__currentLoopData = $career->skills; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $skill): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-md-6 mb-3" data-id="<?php echo e($skill['id']); ?>">
                        <div class="item-card">
                            <div class="d-flex justify-content-between align-items-center">
                                <h6 class="mb-1"><strong><?php echo e($skill['name']); ?></strong></h6>
                                <div>
                                    <button class="btn-icon btn-edit btn-sm" onclick="editSkill('<?php echo e($skill['id']); ?>')"><i class="fas fa-edit"></i></button>
                                    <button class="btn-icon btn-delete btn-sm ml-1" onclick="deleteSkill('<?php echo e($skill['id']); ?>')"><i class="fas fa-trash"></i></button>
                                </div>
                            </div>
                            <p class="text-muted mb-1" style="font-size: 0.9rem;"><?php echo e($skill['proficiency_level']); ?></p>
                            <div class="proficiency-bar">
                                <div class="proficiency-fill" style="width: <?php echo e($skill['proficiency_percentage']); ?>%;"></div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        <?php else: ?>
            <div class="empty-state">
                <i class="fas fa-tools"></i>
                <p>No skills added yet. Click "Add Skill" to get started!</p>
            </div>
        <?php endif; ?>
    </div>
</div>

<!-- Add/Edit Skill Modal -->
<div class="modal fade" id="addSkillModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header gradient-header">
                <h5 class="modal-title" id="skillModalTitle">Add Skill</h5>
                <button type="button" class="close text-white" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="skillForm">
                    <input type="hidden" id="skillId">
                    <div class="form-group">
                        <label for="skill_name">Skill Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="skill_name" placeholder="e.g., JavaScript, Python" required>
                    </div>
                    <div class="form-group">
                        <label for="proficiency_level">Proficiency Level <span class="text-danger">*</span></label>
                        <select class="form-control" id="proficiency_level" required>
                            <option value="">Select Level</option>
                            <option value="Beginner">Beginner</option>
                            <option value="Intermediate">Intermediate</option>
                            <option value="Advanced">Advanced</option>
                            <option value="Expert">Expert</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="proficiency_percentage">Proficiency (%) <span class="text-danger">*</span></label>
                        <input type="range" class="form-control-range" id="proficiency_percentage" min="0" max="100" value="50" oninput="document.getElementById('percentageDisplay').textContent = this.value + '%'">
                        <div class="text-center mt-2">
                            <span id="percentageDisplay" class="badge badge-primary" style="font-size: 1rem;">50%</span>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" id="saveSkillBtn">
                    <i class="fas fa-save mr-2"></i>Save Skill
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Delete Skill Confirmation Modal -->
<div class="modal fade" id="deleteSkillModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title">Confirm Delete</h5>
                <button type="button" class="close text-white" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete this skill? This action cannot be undone.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger" id="confirmDeleteSkillBtn">
                    <i class="fas fa-trash mr-2"></i>Delete
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Projects -->
<div class="career-section-card">
    <div class="section-header">
        <h3 class="section-title">
            <span class="icon"><i class="fas fa-project-diagram"></i></span>
            Projects
        </h3>
        <button class="btn btn-add-item" data-toggle="modal" data-target="#addProjectModal">
            <i class="fas fa-plus mr-2"></i>Add Project
        </button>
    </div>
    <div id="projectsList">
        <?php if($career->projects && count($career->projects) > 0): ?>
            <?php $__currentLoopData = $career->projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="item-card" data-id="<?php echo e($project['id']); ?>">
                    <div class="item-header">
                        <div>
                            <h5 class="item-title"><?php echo e($project['title']); ?></h5>
                            <div class="item-meta">
                                <span><i class="fas fa-calendar mr-1"></i><?php echo e(date('M Y', strtotime($project['start_date']))); ?> - <?php echo e($project['end_date'] ? date('M Y', strtotime($project['end_date'])) : 'Present'); ?></span>
                                <?php if(!empty($project['link'])): ?>
                                    <span><i class="fas fa-link mr-1"></i><a href="<?php echo e($project['link']); ?>" target="_blank">View Project</a></span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="item-actions d-flex gap-2">
                            <button class="btn-icon btn-edit" onclick="editProject('<?php echo e($project['id']); ?>')"><i class="fas fa-edit"></i></button>
                            <button class="btn-icon btn-delete" onclick="deleteProject('<?php echo e($project['id']); ?>')"><i class="fas fa-trash"></i></button>
                        </div>
                    </div>
                    <?php if(!empty($project['description'])): ?>
                        <p class="mt-2 mb-2"><?php echo e($project['description']); ?></p>
                    <?php endif; ?>
                    <?php if(!empty($project['technologies']) && is_array($project['technologies'])): ?>
                        <div>
                            <?php $__currentLoopData = $project['technologies']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tech): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <span class="skill-tag"><?php echo e($tech); ?></span>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php else: ?>
            <div class="empty-state">
                <i class="fas fa-project-diagram"></i>
                <p>No projects added yet. Click "Add Project" to get started!</p>
            </div>
        <?php endif; ?>
    </div>
</div>

<!-- Add/Edit Project Modal -->
<div class="modal fade" id="addProjectModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header gradient-header">
                <h5 class="modal-title" id="projectModalTitle">Add Project</h5>
                <button type="button" class="close text-white" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="projectForm">
                    <input type="hidden" id="projectId">
                    <div class="form-group">
                        <label for="project_title">Project Title <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="project_title" placeholder="e.g., E-Commerce Platform" required>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="project_start_date">Start Date</label>
                                <input type="month" class="form-control" id="project_start_date">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="project_end_date">End Date</label>
                                <input type="month" class="form-control" id="project_end_date">
                                <small class="form-text text-muted">Leave blank if ongoing</small>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="project_link">Project Link (URL)</label>
                        <input type="url" class="form-control" id="project_link" placeholder="https://example.com">
                    </div>
                    <div class="form-group">
                        <label for="project_description">Description</label>
                        <textarea class="form-control summernote" id="project_description" rows="3" placeholder="Describe the project..."></textarea>
                    </div>
                    <div class="form-group">
                        <label for="project_technologies">Technologies</label>
                        <input type="text" class="form-control" id="project_technologies" placeholder="e.g., React, Node.js, MongoDB (comma separated)">
                        <small class="form-text text-muted">Separate multiple technologies with commas</small>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" id="saveProjectBtn">
                    <i class="fas fa-save mr-2"></i>Save Project
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Delete Project Confirmation Modal -->
<div class="modal fade" id="deleteProjectModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title">Confirm Delete</h5>
                <button type="button" class="close text-white" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete this project? This action cannot be undone.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger" id="confirmDeleteProjectBtn">
                    <i class="fas fa-trash mr-2"></i>Delete
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Certifications -->
<div class="career-section-card">
    <div class="section-header">
        <h3 class="section-title">
            <span class="icon"><i class="fas fa-certificate"></i></span>
            Certifications
        </h3>
        <button class="btn btn-add-item" data-toggle="modal" data-target="#addCertificationModal">
            <i class="fas fa-plus mr-2"></i>Add Certification
        </button>
    </div>
    <div id="certificationsList">
        <!-- Certifications will be dynamically loaded here -->
    </div>
</div>

<!-- Add/Edit Certification Modal -->
<div class="modal fade" id="addCertificationModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="certificationModalTitle">Add Certification</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="certificationForm">
                    <input type="hidden" id="certificationId">
                    <div class="form-group">
                        <label for="certification_name">Certification Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="certification_name" placeholder="e.g., AWS Certified Solutions Architect" required>
                    </div>
                    <div class="form-group">
                        <label for="issuing_organization">Organization <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="issuing_organization" placeholder="e.g., Amazon Web Services" required>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="issue_date">Date Issued <span class="text-danger">*</span></label>
                                <input type="month" class="form-control" id="issue_date" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="expiry_date">Expiry Date</label>
                                <input type="month" class="form-control" id="expiry_date">
                                <small class="form-text text-muted">Leave blank if no expiry</small>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="credential_id">Credential ID</label>
                        <input type="text" class="form-control" id="credential_id" placeholder="e.g., ABC123XYZ">
                    </div>
                    <div class="form-group">
                        <label for="credential_url">Credential URL</label>
                        <input type="url" class="form-control" id="credential_url" placeholder="https://example.com/verify">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" id="saveCertificationBtn">
                    <i class="fas fa-save mr-2"></i>Save Certification
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Delete Certification Confirmation Modal -->
<div class="modal fade" id="deleteCertificationModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title">Confirm Delete</h5>
                <button type="button" class="close text-white" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete this certification? This action cannot be undone.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger" id="confirmDeleteCertificationBtn">
                    <i class="fas fa-trash mr-2"></i>Delete
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Languages -->
<div class="career-section-card">
    <div class="section-header">
        <h3 class="section-title">
            <span class="icon"><i class="fas fa-language"></i></span>
            Languages
        </h3>
        <button class="btn btn-add-item" data-toggle="modal" data-target="#addLanguageModal">
            <i class="fas fa-plus mr-2"></i>Add Language
        </button>
    </div>
    <div id="languagesList">
        <!-- Languages will be dynamically loaded here -->
    </div>
</div>

<!-- Add/Edit Language Modal -->
<div class="modal fade" id="addLanguageModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header gradient-header">
                <h5 class="modal-title" id="languageModalTitle">Add Language</h5>
                <button type="button" class="close text-white" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="languageForm">
                    <input type="hidden" id="languageId">
                    <div class="form-group">
                        <label for="language_name">Language <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="language_name" placeholder="e.g., English, Spanish, French" required>
                    </div>
                    <div class="form-group">
                        <label for="language_proficiency">Proficiency <span class="text-danger">*</span></label>
                        <select class="form-control" id="language_proficiency" required>
                            <option value="">Select Proficiency</option>
                            <option value="Native">Native</option>
                            <option value="Fluent">Fluent</option>
                            <option value="Intermediate">Intermediate</option>
                            <option value="Basic">Basic</option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" id="saveLanguageBtn">
                    <i class="fas fa-save mr-2"></i>Save Language
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Delete Language Confirmation Modal -->
<div class="modal fade" id="deleteLanguageModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title">Confirm Delete</h5>
                <button type="button" class="close text-white" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete this language? This action cannot be undone.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger" id="confirmDeleteLanguageBtn">
                    <i class="fas fa-trash mr-2"></i>Delete
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Social Links / Professional Links -->
<div class="career-section-card">
    <div class="section-header">
        <h3 class="section-title">
            <span class="icon"><i class="fas fa-link"></i></span>
            Professional Links
        </h3>
        <button class="btn btn-add-item" data-toggle="modal" data-target="#addSocialLinkModal">
            <i class="fas fa-plus mr-2"></i>Add Link
        </button>
    </div>
    <div id="socialLinksList">
        <!-- Links will be rendered here dynamically -->
    </div>
</div>

<!-- Add/Edit Social Link Modal -->
<div class="modal fade" id="addSocialLinkModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header gradient-header">
                <h5 class="modal-title" id="socialLinkModalTitle">Add Professional Link</h5>
                <button type="button" class="close text-white" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="socialLinkForm">
                    <input type="hidden" id="professionalLinkId">
                    <div class="form-group">
                        <label for="professional_platform">Platform <span class="text-danger">*</span></label>
                        <select class="form-control" id="professional_platform" required>
                            <option value="">Select Platform</option>
                            <option value="LinkedIn">LinkedIn</option>
                            <option value="GitHub">GitHub</option>
                            <option value="Portfolio">Portfolio</option>
                            <option value="Twitter">Twitter</option>
                            <option value="Facebook">Facebook</option>
                            <option value="Instagram">Instagram</option>
                            <option value="Stack Overflow">Stack Overflow</option>
                            <option value="Medium">Medium</option>
                            <option value="YouTube">YouTube</option>
                            <option value="Behance">Behance</option>
                            <option value="Dribbble">Dribbble</option>
                            <option value="GitLab">GitLab</option>
                            <option value="Bitbucket">Bitbucket</option>
                            <option value="CodePen">CodePen</option>
                            <option value="Discord">Discord</option>
                            <option value="Telegram">Telegram</option>
                            <option value="WhatsApp">WhatsApp</option>
                            <option value="Reddit">Reddit</option>
                            <option value="TikTok">TikTok</option>
                            <option value="Twitch">Twitch</option>
                            <option value="Other">Other</option>
                            <option value="Portfolio Website">Portfolio Website</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="professional_url">Profile URL <span class="text-danger">*</span></label>
                        <input type="url" class="form-control" id="professional_url" placeholder="https://example.com/profile" required>
                    </div>
                    <input type="hidden" id="professional_icon">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" id="saveSocialLinkBtn">
                    <i class="fas fa-save mr-2"></i>Save Link
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Delete Social Link Confirmation Modal -->
<div class="modal fade" id="deleteProfessionalLinkModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title">Confirm Delete</h5>
                <button type="button" class="close text-white" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete this professional link? This action cannot be undone.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger" id="confirmDeleteProfessionalLinkBtn">
                    <i class="fas fa-trash mr-2"></i>Delete
                </button>
            </div>
        </div>
    </div>
</div>
    </div>
</section>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts_custom'); ?>
<script src="<?php echo e(asset('backend/plugins/summernote/summernote-bs4.min.js')); ?>"></script>
<script>
// Make educationData globally accessible
window.educationData = <?php echo json_encode($career->education ?? [], 15, 512) ?>;
window.experienceData = <?php echo json_encode($career->work_experience ?? [], 15, 512) ?>;
window.skillsData = <?php echo json_encode($career->skills ?? [], 15, 512) ?>;
window.projectsData = <?php echo json_encode($career->projects ?? [], 15, 512) ?>;
window.certificationsData = <?php echo json_encode($career->certifications ?? [], 15, 512) ?>;
window.languagesData = <?php echo json_encode($career->languages ?? [], 15, 512) ?>;
window.professionalLinksData = <?php echo json_encode($career->professional_links ?? [], 15, 512) ?>;
let educationIdToDelete = null;
let experienceIdToDelete = null;
let skillIdToDelete = null;
let projectIdToDelete = null;
let certificationIdToDelete = null;
let languageIdToDelete = null;
let professionalLinkIdToDelete = null;

// ========== SEE MORE / READ MORE TOGGLE FUNCTIONS ==========
function toggleObjective() {
    const objectiveText = document.getElementById('objectiveText');
    const toggleBtn = document.getElementById('objectiveToggleText');

    if (objectiveText && toggleBtn) {
        objectiveText.classList.toggle('expanded');
        toggleBtn.textContent = objectiveText.classList.contains('expanded') ? 'See Less' : 'See More';
    }
}

window.toggleDescription = function(expId) {
    const descElement = document.getElementById(`description-${expId}`);
    const toggleBtn = document.getElementById(`toggle-${expId}`);

    console.log('Toggle called for:', expId, 'Desc:', descElement, 'Btn:', toggleBtn);

    if (descElement && toggleBtn) {
        descElement.classList.toggle('expanded');
        const isExpanded = descElement.classList.contains('expanded');
        toggleBtn.textContent = isExpanded ? 'See Less' : 'See More';
        console.log('Toggled - Expanded:', isExpanded);
    }
};

$(document).ready(function() {
    // Initialize Summernote for description field
    $('.summernote').summernote({height: 150});
});

document.addEventListener('DOMContentLoaded', function() {
    // Career Objective Save
    const saveObjectiveBtn = document.getElementById('saveObjectiveBtn');
    const objectiveTextarea = document.getElementById('careerObjectiveText');
    const objectiveContent = document.getElementById('objectiveContent');

    if (saveObjectiveBtn) {
        saveObjectiveBtn.addEventListener('click', function() {
            const objective = objectiveTextarea.value.trim();

            if (!objective) {
                toastr.warning('Please enter your career objective.');
                return;
            }

            // Disable button and show loading
            saveObjectiveBtn.disabled = true;
            saveObjectiveBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Saving...';

            // Send AJAX request
            fetch('<?php echo e(route("admin.career.update.objective")); ?>', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>'
                },
                body: JSON.stringify({
                    career_objective: objective
                })
            })
            .then(async response => {
                const contentType = response.headers.get('content-type');
                if (!response.ok) {
                    if (contentType && contentType.includes('application/json')) {
                        const err = await response.json();
                        throw err;
                    } else {
                        throw new Error('Server error occurred');
                    }
                }
                return response.json();
            })
            .then(data => {
                if (data.success) {
                    // Update content display
                    objectiveContent.innerHTML = '<p>' + data.career_objective + '</p>';

                    // Close the form
                    $('#objectiveForm').collapse('hide');

                    // Show success message
                    toastr.success(data.message);
                } else {
                    toastr.error(data.message || 'Failed to update career objective. Please try again.');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                if (error.errors) {
                    const errorMessages = Object.values(error.errors).flat().join('<br>');
                    toastr.error(errorMessages);
                } else if (error.message) {
                    toastr.error(error.message);
                } else {
                    toastr.error('An error occurred. Please try again.');
                }
            })
            .finally(() => {
                // Re-enable button
                saveObjectiveBtn.disabled = false;
                saveObjectiveBtn.innerHTML = '<i class="fas fa-save mr-2"></i>Save';
            });
        });
    }

    // ===== EDUCATION SECTION =====
    const educationForm = document.getElementById('educationForm');
    const saveEducationBtn = document.getElementById('saveEducationBtn');
    const addEducationModal = $('#addEducationModal');

    // Reset form when modal is closed (not when opened)
    addEducationModal.on('hidden.bs.modal', function() {
        // Always reset for next time
        educationForm.reset();
        document.getElementById('education_id').value = '';
        document.getElementById('educationModalTitle').innerHTML = '<i class="fas fa-graduation-cap mr-2"></i>Add Education';
        saveEducationBtn.innerHTML = '<i class="fas fa-save mr-2"></i>Save Education';
    });

    // Save Education (Add or Update)
    if (saveEducationBtn) {
        saveEducationBtn.addEventListener('click', function() {
            const educationId = document.getElementById('education_id').value;
            const formData = {
                degree: document.getElementById('degree').value.trim(),
                institution: document.getElementById('institution').value.trim(),
                location: document.getElementById('location').value.trim(),
                start_date: document.getElementById('start_date').value,
                end_date: document.getElementById('end_date').value,
                cgpa: document.getElementById('cgpa').value.trim(),
                group: document.getElementById('group').value,
                major: document.getElementById('major').value.trim(),
                minor: document.getElementById('minor').value.trim()
            };

            // Validation
            if (!formData.degree || !formData.institution || !formData.start_date) {
                toastr.warning('Please fill in all required fields.');
                return;
            }

            // Disable button
            saveEducationBtn.disabled = true;
            saveEducationBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Saving...';

            const url = educationId
                ? '<?php echo e(route("admin.career.education.update")); ?>'
                : '<?php echo e(route("admin.career.education.add")); ?>';

            const data = educationId ? { ...formData, id: educationId } : formData;

            // Send AJAX request
            fetch(url, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>'
                },
                body: JSON.stringify(data)
            })
            .then(async response => {
                const contentType = response.headers.get('content-type');
                if (!response.ok) {
                    if (contentType && contentType.includes('application/json')) {
                        const err = await response.json();
                        throw err;
                    } else {
                        throw new Error('Server error occurred');
                    }
                }
                return response.json();
            })
            .then(data => {
                if (data.success) {
                    toastr.success(data.message);
                    addEducationModal.modal('hide');
                    window.educationData = data.education;
                    renderEducationList();
                } else {
                    toastr.error(data.message || 'Failed to save education. Please try again.');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                if (error.errors) {
                    // Display validation errors
                    const errorMessages = Object.values(error.errors).flat().join('<br>');
                    toastr.error(errorMessages);
                } else if (error.message) {
                    toastr.error(error.message);
                } else {
                    toastr.error('An error occurred. Please try again.');
                }
            })
            .finally(() => {
                saveEducationBtn.disabled = false;
                saveEducationBtn.innerHTML = '<i class="fas fa-save mr-2"></i>Save Education';
            });
        });
    }

    // Render Education List
    function renderEducationList() {
        const educationList = document.getElementById('educationList');

        if (!window.educationData || window.educationData.length === 0) {
            educationList.innerHTML = `
                <div class="empty-state">
                    <i class="fas fa-graduation-cap"></i>
                    <p>No education entries yet. Click "Add Education" to get started!</p>
                </div>
            `;
            return;
        }

        educationList.innerHTML = window.educationData.map(edu => {
            const startDate = new Date(edu.start_date);
            const endDate = edu.end_date ? new Date(edu.end_date) : null;
            const dateRange = `${startDate.toLocaleDateString('en-US', {month: 'short', year: 'numeric'})} - ${endDate ? endDate.toLocaleDateString('en-US', {month: 'short', year: 'numeric'}) : 'Present'}`;

            let majorMinor = '';
            if (edu.major || edu.minor) {
                majorMinor = '<p class="mb-0 mt-2 text-muted">';
                if (edu.major) majorMinor += `Major: ${edu.major}`;
                if (edu.major && edu.minor) majorMinor += ' | ';
                if (edu.minor) majorMinor += `Minor: ${edu.minor}`;
                majorMinor += '</p>';
            }

            return `
                <div class="item-card" data-id="${edu.id}">
                    <div class="item-header">
                        <div>
                            <h5 class="item-title">${edu.degree}</h5>
                            <p class="item-subtitle mb-1">${edu.institution}</p>
                            <div class="item-meta">
                                <span><i class="fas fa-calendar mr-1"></i>${dateRange}</span>
                                ${edu.location ? `<span><i class="fas fa-map-marker-alt mr-1"></i>${edu.location}</span>` : ''}
                                ${edu.cgpa ? `<span><i class="fas fa-star mr-1"></i>CGPA: ${edu.cgpa}</span>` : ''}
                                ${edu.group ? `<span><i class="fas fa-book mr-1"></i>${edu.group}</span>` : ''}
                            </div>
                        </div>
                        <div class="item-actions d-flex gap-2">
                            <button class="btn-icon btn-edit" onclick="editEducation('${edu.id}')"><i class="fas fa-edit"></i></button>
                            <button class="btn-icon btn-delete" onclick="deleteEducation('${edu.id}')"><i class="fas fa-trash"></i></button>
                        </div>
                    </div>
                    ${majorMinor}
                </div>
            `;
        }).join('');
    }
});

// Edit Education (Global function for onclick)
window.editEducation = function(id) {
    console.log('Edit clicked for ID:', id);
    console.log('Education Data:', window.educationData);

    const edu = window.educationData.find(e => String(e.id) === String(id));

    if (!edu) {
        console.error('Education not found for ID:', id);
        toastr.error('Education entry not found');
        return;
    }

    console.log('Found education:', edu);

    // First update modal title and button
    document.getElementById('educationModalTitle').innerHTML = '<i class="fas fa-edit mr-2"></i>Edit Education';
    document.getElementById('saveEducationBtn').innerHTML = '<i class="fas fa-save mr-2"></i>Update Education';

    // Populate form fields
    document.getElementById('education_id').value = edu.id;
    document.getElementById('degree').value = edu.degree || '';
    document.getElementById('institution').value = edu.institution || '';
    document.getElementById('location').value = edu.location || '';
    document.getElementById('start_date').value = edu.start_date || '';
    document.getElementById('end_date').value = edu.end_date || '';
    document.getElementById('cgpa').value = edu.cgpa || '';
    document.getElementById('group').value = edu.group || '';
    document.getElementById('major').value = edu.major || '';
    document.getElementById('minor').value = edu.minor || '';

    console.log('Form populated, opening modal');

    // Show modal after a small delay to ensure DOM is updated
    setTimeout(function() {
        $('#addEducationModal').modal('show');
    }, 100);
}

// Delete Education (Global function for onclick)
window.deleteEducation = function(id) {
    educationIdToDelete = id;
    $('#deleteEducationModal').modal('show');
}

// Confirm Delete Education
document.getElementById('confirmDeleteEducationBtn').addEventListener('click', function() {
    if (!educationIdToDelete) return;

    // Disable button and show loading
    const confirmDeleteBtn = this;
    confirmDeleteBtn.disabled = true;
    confirmDeleteBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Deleting...';

    fetch('<?php echo e(route("admin.career.education.delete")); ?>', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>'
        },
        body: JSON.stringify({ id: educationIdToDelete })
    })
    .then(async response => {
        const contentType = response.headers.get('content-type');
        if (!response.ok) {
            if (contentType && contentType.includes('application/json')) {
                const err = await response.json();
                throw err;
            } else {
                throw new Error('Server error occurred');
            }
        }
        return response.json();
    })
    .then(data => {
        if (data.success) {
            toastr.success(data.message);
            window.educationData = window.educationData.filter(e => e.id !== educationIdToDelete);
            const element = document.querySelector(`[data-id="${educationIdToDelete}"]`);
            if (element) {
                element.remove();
            }

            // Show empty state if no items left
            if (window.educationData.length === 0) {
                document.getElementById('educationList').innerHTML = `
                    <div class="empty-state">
                        <i class="fas fa-graduation-cap"></i>
                        <p>No education entries yet. Click "Add Education" to get started!</p>
                    </div>
                `;
            }

            // Close modal
            $('#deleteEducationModal').modal('hide');
        } else {
            toastr.error(data.message || 'Failed to delete education. Please try again.');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        if (error.errors) {
            const errorMessages = Object.values(error.errors).flat().join('<br>');
            toastr.error(errorMessages);
        } else if (error.message) {
            toastr.error(error.message);
        } else {
            toastr.error('An error occurred. Please try again.');
        }
    })
    .finally(() => {
        confirmDeleteBtn.disabled = false;
        confirmDeleteBtn.innerHTML = '<i class="fas fa-trash mr-2"></i>Delete';
        educationIdToDelete = null;
    });
});

// ========== WORK EXPERIENCE FUNCTIONS ==========

// Save Work Experience (Add or Update)
document.getElementById('saveExperienceBtn').addEventListener('click', function() {
    const experienceId = document.getElementById('experienceId').value;
    const position = document.getElementById('position').value.trim();
    const company = document.getElementById('company').value.trim();
    const location = document.getElementById('exp_location').value.trim();
    const start_date = document.getElementById('exp_start_date').value;
    const end_date = document.getElementById('exp_end_date').value;
    const description = $('#description').summernote('code');

    if (!position || !company || !start_date) {
        toastr.warning('Please fill in all required fields (Position, Company, Start Date).');
        return;
    }

    // Disable button and show loading
    const saveBtn = this;
    saveBtn.disabled = true;
    saveBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Saving...';

    const url = experienceId
        ? '<?php echo e(route("admin.career.experience.update")); ?>'
        : '<?php echo e(route("admin.career.experience.add")); ?>';

    const formData = {
        position: position,
        company: company,
        location: location,
        start_date: start_date,
        end_date: end_date,
        description: description
    };

    if (experienceId) {
        formData.id = experienceId;
    }

    fetch(url, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>'
        },
        body: JSON.stringify(formData)
    })
    .then(async response => {
        const contentType = response.headers.get('content-type');
        if (!response.ok) {
            if (contentType && contentType.includes('application/json')) {
                const err = await response.json();
                throw err;
            } else {
                throw new Error('Server error occurred');
            }
        }
        return response.json();
    })
    .then(data => {
        if (data.success) {
            toastr.success(data.message);
            window.experienceData = data.work_experience;
            renderWorkExperienceList();
            $('#addExperienceModal').modal('hide');
        } else {
            toastr.error(data.message || 'Failed to save work experience. Please try again.');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        if (error.errors) {
            const errorMessages = Object.values(error.errors).flat().join('<br>');
            toastr.error(errorMessages);
        } else if (error.message) {
            toastr.error(error.message);
        } else {
            toastr.error('An error occurred. Please try again.');
        }
    })
    .finally(() => {
        saveBtn.disabled = false;
        saveBtn.innerHTML = '<i class="fas fa-save mr-2"></i>Save Experience';
    });
});

// Reset form when modal is hidden
$('#addExperienceModal').on('hidden.bs.modal', function() {
    document.getElementById('experienceForm').reset();
    $('#description').summernote('code', '');
    document.getElementById('experienceId').value = '';
    document.getElementById('experienceModalTitle').textContent = 'Add Work Experience';
});

// Render Work Experience List
function renderWorkExperienceList() {
    const experienceList = document.getElementById('experienceList');

    if (!window.experienceData || window.experienceData.length === 0) {
        experienceList.innerHTML = `
            <div class="empty-state">
                <i class="fas fa-briefcase"></i>
                <p>No work experience entries yet. Click "Add Experience" to get started!</p>
            </div>
        `;
        return;
    }

    experienceList.innerHTML = window.experienceData.map(exp => {
        const startDate = new Date(exp.start_date);
        const endDate = exp.end_date ? new Date(exp.end_date) : null;
        const dateRange = `${startDate.toLocaleDateString('en-US', {month: 'short', year: 'numeric'})} - ${endDate ? endDate.toLocaleDateString('en-US', {month: 'short', year: 'numeric'}) : 'Present'}`;

        return `
            <div class="item-card" data-id="${exp.id}">
                <div class="item-header">
                    <div>
                        <h5 class="item-title">${exp.position}</h5>
                        <p class="item-subtitle mb-1">${exp.company}</p>
                        <div class="item-meta">
                            <span><i class="fas fa-calendar mr-1"></i>${dateRange}</span>
                            ${exp.location ? `<span><i class="fas fa-map-marker-alt mr-1"></i>${exp.location}</span>` : ''}
                        </div>
                    </div>
                    <div class="item-actions d-flex gap-2">
                        <button class="btn-icon btn-edit" onclick="editWorkExperience('${exp.id}')"><i class="fas fa-edit"></i></button>
                        <button class="btn-icon btn-delete" onclick="deleteWorkExperience('${exp.id}')"><i class="fas fa-trash"></i></button>
                    </div>
                </div>
                ${exp.description ? `<div class="description-container">${exp.description}</div>` : ''}
            </div>
        `;
    }).join('');
}

// Edit Work Experience (Global function for onclick)
window.editWorkExperience = function(id) {
    const exp = window.experienceData.find(e => String(e.id) === String(id));

    if (!exp) {
        toastr.error('Work experience not found!');
        return;
    }

    // Populate form fields
    document.getElementById('experienceId').value = exp.id;
    document.getElementById('position').value = exp.position || '';
    document.getElementById('company').value = exp.company || '';
    document.getElementById('exp_location').value = exp.location || '';
    document.getElementById('exp_start_date').value = exp.start_date || '';
    document.getElementById('exp_end_date').value = exp.end_date || '';
    $('#description').summernote('code', exp.description || '');

    // Update modal title
    document.getElementById('experienceModalTitle').textContent = 'Edit Work Experience';

    // Show modal with slight delay to ensure data is populated
    setTimeout(() => {
        $('#addExperienceModal').modal('show');
    }, 100);
};

// Delete Work Experience (Global function for onclick)
window.deleteWorkExperience = function(id) {
    experienceIdToDelete = id;
    $('#deleteExperienceModal').modal('show');
};

// Confirm Delete Work Experience
document.getElementById('confirmDeleteExperienceBtn').addEventListener('click', function() {
    if (!experienceIdToDelete) return;

    // Disable button and show loading
    const confirmDeleteBtn = this;
    confirmDeleteBtn.disabled = true;
    confirmDeleteBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Deleting...';

    fetch('<?php echo e(route("admin.career.experience.delete")); ?>', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>'
        },
        body: JSON.stringify({ id: experienceIdToDelete })
    })
    .then(async response => {
        const contentType = response.headers.get('content-type');
        if (!response.ok) {
            if (contentType && contentType.includes('application/json')) {
                const err = await response.json();
                throw err;
            } else {
                throw new Error('Server error occurred');
            }
        }
        return response.json();
    })
    .then(data => {
        if (data.success) {
            toastr.success(data.message);
            window.experienceData = window.experienceData.filter(e => e.id !== experienceIdToDelete);
            const element = document.querySelector(`#experienceList [data-id="${experienceIdToDelete}"]`);
            if (element) {
                element.remove();
            }

            // Show empty state if no items left
            if (window.experienceData.length === 0) {
                document.getElementById('experienceList').innerHTML = `
                    <div class="empty-state">
                        <i class="fas fa-briefcase"></i>
                        <p>No work experience entries yet. Click "Add Experience" to get started!</p>
                    </div>
                `;
            }

            // Close modal
            $('#deleteExperienceModal').modal('hide');
        } else {
            toastr.error(data.message || 'Failed to delete work experience. Please try again.');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        if (error.errors) {
            const errorMessages = Object.values(error.errors).flat().join('<br>');
            toastr.error(errorMessages);
        } else if (error.message) {
            toastr.error(error.message);
        } else {
            toastr.error('An error occurred. Please try again.');
        }
    })
    .finally(() => {
        confirmDeleteBtn.disabled = false;
        confirmDeleteBtn.innerHTML = '<i class="fas fa-trash mr-2"></i>Delete';
        experienceIdToDelete = null;
    });
});

// ========== SKILLS FUNCTIONS ==========

// Save Skill (Add or Update)
document.getElementById('saveSkillBtn').addEventListener('click', function() {
    const skillId = document.getElementById('skillId').value;
    const skill_name = document.getElementById('skill_name').value.trim();
    const proficiency_level = document.getElementById('proficiency_level').value;
    const proficiency_percentage = document.getElementById('proficiency_percentage').value;

    if (!skill_name || !proficiency_level || !proficiency_percentage) {
        toastr.warning('Please fill in all required fields.');
        return;
    }

    // Disable button and show loading
    const saveBtn = this;
    saveBtn.disabled = true;
    saveBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Saving...';

    const url = skillId
        ? '<?php echo e(route("admin.career.skill.update")); ?>'
        : '<?php echo e(route("admin.career.skill.add")); ?>';

    const formData = {
        name: skill_name,
        proficiency_level: proficiency_level,
        proficiency_percentage: parseInt(proficiency_percentage)
    };

    if (skillId) {
        formData.id = skillId;
    }

    fetch(url, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>'
        },
        body: JSON.stringify(formData)
    })
    .then(async response => {
        const contentType = response.headers.get('content-type');
        if (!response.ok) {
            if (contentType && contentType.includes('application/json')) {
                const err = await response.json();
                throw err;
            } else {
                throw new Error('Server error occurred');
            }
        }
        return response.json();
    })
    .then(data => {
        if (data.success) {
            toastr.success(data.message);
            window.skillsData = data.skills;
            renderSkillsList();
            $('#addSkillModal').modal('hide');
        } else {
            toastr.error(data.message || 'Failed to save skill. Please try again.');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        if (error.errors) {
            const errorMessages = Object.values(error.errors).flat().join('<br>');
            toastr.error(errorMessages);
        } else if (error.message) {
            toastr.error(error.message);
        } else {
            toastr.error('An error occurred. Please try again.');
        }
    })
    .finally(() => {
        saveBtn.disabled = false;
        saveBtn.innerHTML = '<i class="fas fa-save mr-2"></i>Save Skill';
    });
});

// Reset form when modal is hidden
$('#addSkillModal').on('hidden.bs.modal', function() {
    document.getElementById('skillForm').reset();
    document.getElementById('skillId').value = '';
    document.getElementById('skillModalTitle').textContent = 'Add Skill';
    document.getElementById('percentageDisplay').textContent = '50%';
});

// Render Skills List
function renderSkillsList() {
    const skillsList = document.getElementById('skillsList');

    if (!window.skillsData || window.skillsData.length === 0) {
        skillsList.innerHTML = `
            <div class="empty-state">
                <i class="fas fa-tools"></i>
                <p>No skills added yet. Click "Add Skill" to get started!</p>
            </div>
        `;
        return;
    }

    let html = '<div class="row">';
    window.skillsData.forEach(skill => {
        html += `
            <div class="col-md-6 mb-3" data-id="${skill.id}">
                <div class="item-card">
                    <div class="d-flex justify-content-between align-items-center">
                        <h6 class="mb-1"><strong>${skill.name}</strong></h6>
                        <div>
                            <button class="btn-icon btn-edit btn-sm" onclick="editSkill('${skill.id}')"><i class="fas fa-edit"></i></button>
                            <button class="btn-icon btn-delete btn-sm ml-1" onclick="deleteSkill('${skill.id}')"><i class="fas fa-trash"></i></button>
                        </div>
                    </div>
                    <p class="text-muted mb-1" style="font-size: 0.9rem;">${skill.proficiency_level}</p>
                    <div class="proficiency-bar">
                        <div class="proficiency-fill" style="width: ${skill.proficiency_percentage}%;"></div>
                    </div>
                </div>
            </div>
        `;
    });
    html += '</div>';
    skillsList.innerHTML = html;
}

// Edit Skill (Global function for onclick)
window.editSkill = function(id) {
    const skill = window.skillsData.find(s => String(s.id) === String(id));

    if (!skill) {
        toastr.error('Skill not found!');
        return;
    }

    // Populate form fields
    document.getElementById('skillId').value = skill.id;
    document.getElementById('skill_name').value = skill.name || '';
    document.getElementById('proficiency_level').value = skill.proficiency_level || '';
    document.getElementById('proficiency_percentage').value = skill.proficiency_percentage || 50;
    document.getElementById('percentageDisplay').textContent = (skill.proficiency_percentage || 50) + '%';

    // Update modal title
    document.getElementById('skillModalTitle').textContent = 'Edit Skill';

    // Show modal with slight delay
    setTimeout(() => {
        $('#addSkillModal').modal('show');
    }, 100);
};

// Delete Skill (Global function for onclick)
window.deleteSkill = function(id) {
    skillIdToDelete = id;
    $('#deleteSkillModal').modal('show');
};

// Confirm Delete Skill
document.getElementById('confirmDeleteSkillBtn').addEventListener('click', function() {
    if (!skillIdToDelete) return;

    // Disable button and show loading
    const confirmDeleteBtn = this;
    confirmDeleteBtn.disabled = true;
    confirmDeleteBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Deleting...';

    fetch('<?php echo e(route("admin.career.skill.delete")); ?>', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>'
        },
        body: JSON.stringify({ id: skillIdToDelete })
    })
    .then(async response => {
        const contentType = response.headers.get('content-type');
        if (!response.ok) {
            if (contentType && contentType.includes('application/json')) {
                const err = await response.json();
                throw err;
            } else {
                throw new Error('Server error occurred');
            }
        }
        return response.json();
    })
    .then(data => {
        if (data.success) {
            toastr.success(data.message);
            window.skillsData = window.skillsData.filter(s => s.id !== skillIdToDelete);
            renderSkillsList();

            // Close modal
            $('#deleteSkillModal').modal('hide');
        } else {
            toastr.error(data.message || 'Failed to delete skill. Please try again.');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        if (error.errors) {
            const errorMessages = Object.values(error.errors).flat().join('<br>');
            toastr.error(errorMessages);
        } else if (error.message) {
            toastr.error(error.message);
        } else {
            toastr.error('An error occurred. Please try again.');
        }
    })
    .finally(() => {
        confirmDeleteBtn.disabled = false;
        confirmDeleteBtn.innerHTML = '<i class="fas fa-trash mr-2"></i>Delete';
        skillIdToDelete = null;
    });
});

// ========== PROJECTS FUNCTIONS ==========

// Save Project (Add or Update)
document.getElementById('saveProjectBtn').addEventListener('click', function() {
    const projectId = document.getElementById('projectId').value;
    const project_title = document.getElementById('project_title').value.trim();
    const project_start_date = document.getElementById('project_start_date').value;
    const project_end_date = document.getElementById('project_end_date').value;
    const project_link = document.getElementById('project_link').value.trim();
    const project_description = $('#project_description').summernote('code');
    const project_technologies = document.getElementById('project_technologies').value.trim();

    if (!project_title) {
        toastr.warning('Please enter project title.');
        return;
    }

    // Disable button and show loading
    const saveBtn = this;
    saveBtn.disabled = true;
    saveBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Saving...';

    const url = projectId
        ? '<?php echo e(route("admin.career.project.update")); ?>'
        : '<?php echo e(route("admin.career.project.add")); ?>';

    // Parse technologies from comma-separated string
    const technologies = project_technologies ? project_technologies.split(',').map(t => t.trim()).filter(t => t) : [];

    const formData = {
        title: project_title,
        start_date: project_start_date,
        end_date: project_end_date,
        link: project_link,
        description: project_description,
        technologies: technologies
    };

    if (projectId) {
        formData.id = projectId;
    }

    fetch(url, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>'
        },
        body: JSON.stringify(formData)
    })
    .then(response => {
        if (!response.ok) {
            return response.json().then(err => {
                throw { status: response.status, data: err };
            });
        }
        return response.json();
    })
    .then(data => {
        if (data.success) {
            toastr.success(data.message);
            window.projectsData = data.projects;
            renderProjectsList();
            $('#addProjectModal').modal('hide');
        } else {
            toastr.error(data.message || 'Failed to save project. Please try again.');
        }
    })
    .catch(error => {
        if (error.data && error.data.errors) {
            // Display validation errors
            const errorMessages = Object.values(error.data.errors).flat().join('<br>');
            toastr.error(errorMessages, 'Validation Error', {enableHtml: true, timeOut: 5000});
        } else if (error.data && error.data.message) {
            toastr.error(error.data.message);
        } else {
            console.error('Error:', error);
            toastr.error('An error occurred. Please try again.');
        }
    })
    .finally(() => {
        saveBtn.disabled = false;
        saveBtn.innerHTML = '<i class="fas fa-save mr-2"></i>Save Project';
    });
});

// Reset form when modal is hidden
$('#addProjectModal').on('hidden.bs.modal', function() {
    document.getElementById('projectForm').reset();
    $('#project_description').summernote('code', '');
    document.getElementById('projectId').value = '';
    document.getElementById('projectModalTitle').textContent = 'Add Project';
});

// Render Projects List
function renderProjectsList() {
    const projectsList = document.getElementById('projectsList');

    if (!window.projectsData || window.projectsData.length === 0) {
        projectsList.innerHTML = `
            <div class="empty-state">
                <i class="fas fa-project-diagram"></i>
                <p>No projects added yet. Click "Add Project" to get started!</p>
            </div>
        `;
        return;
    }

    projectsList.innerHTML = window.projectsData.map(project => {
        let dateRange = '';
        if (project.start_date) {
            const startDate = new Date(project.start_date);
            const endDate = project.end_date ? new Date(project.end_date) : null;
            dateRange = `${startDate.toLocaleDateString('en-US', {month: 'short', year: 'numeric'})} - ${endDate ? endDate.toLocaleDateString('en-US', {month: 'short', year: 'numeric'}) : 'Present'}`;
        }

        let technologiesHtml = '';
        if (project.technologies && Array.isArray(project.technologies) && project.technologies.length > 0) {
            technologiesHtml = '<div>' + project.technologies.map(tech => `<span class="skill-tag">${tech}</span>`).join('') + '</div>';
        }

        return `
            <div class="item-card" data-id="${project.id}">
                <div class="item-header">
                    <div>
                        <h5 class="item-title">${project.title}</h5>
                        <div class="item-meta">
                            ${dateRange ? `<span><i class="fas fa-calendar mr-1"></i>${dateRange}</span>` : ''}
                            ${project.link ? `<span><i class="fas fa-link mr-1"></i><a href="${project.link}" target="_blank">View Project</a></span>` : ''}
                        </div>
                    </div>
                    <div class="item-actions d-flex gap-2">
                        <button class="btn-icon btn-edit" onclick="editProject('${project.id}')"><i class="fas fa-edit"></i></button>
                        <button class="btn-icon btn-delete" onclick="deleteProject('${project.id}')"><i class="fas fa-trash"></i></button>
                    </div>
                </div>
                ${project.description ? `<p class="mt-2 mb-2">${project.description}</p>` : ''}
                ${technologiesHtml}
            </div>
        `;
    }).join('');
}

// Edit Project (Global function for onclick)
window.editProject = function(id) {
    const project = window.projectsData.find(p => String(p.id) === String(id));

    if (!project) {
        toastr.error('Project not found!');
        return;
    }

    // Populate form fields
    document.getElementById('projectId').value = project.id;
    document.getElementById('project_title').value = project.title || '';
    document.getElementById('project_start_date').value = project.start_date || '';
    document.getElementById('project_end_date').value = project.end_date || '';
    document.getElementById('project_link').value = project.link || '';
    $('#project_description').summernote('code', project.description || '');

    // Convert technologies array back to comma-separated string
    const techString = project.technologies && Array.isArray(project.technologies)
        ? project.technologies.join(', ')
        : '';
    document.getElementById('project_technologies').value = techString;

    // Update modal title
    document.getElementById('projectModalTitle').textContent = 'Edit Project';

    // Show modal with slight delay
    setTimeout(() => {
        $('#addProjectModal').modal('show');
    }, 100);
};

// Delete Project (Global function for onclick)
window.deleteProject = function(id) {
    projectIdToDelete = id;
    $('#deleteProjectModal').modal('show');
};

// Confirm Delete Project
document.getElementById('confirmDeleteProjectBtn').addEventListener('click', function() {
    if (!projectIdToDelete) return;

    // Disable button and show loading
    const confirmDeleteBtn = this;
    confirmDeleteBtn.disabled = true;
    confirmDeleteBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Deleting...';

    fetch('<?php echo e(route("admin.career.project.delete")); ?>', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>'
        },
        body: JSON.stringify({ id: projectIdToDelete })
    })
    .then(async response => {
        const contentType = response.headers.get('content-type');
        if (!response.ok) {
            if (contentType && contentType.includes('application/json')) {
                const err = await response.json();
                throw err;
            } else {
                throw new Error('Server error occurred');
            }
        }
        return response.json();
    })
    .then(data => {
        if (data.success) {
            toastr.success(data.message);
            window.projectsData = window.projectsData.filter(p => p.id !== projectIdToDelete);
            renderProjectsList();

            // Close modal
            $('#deleteProjectModal').modal('hide');
        } else {
            toastr.error(data.message || 'Failed to delete project. Please try again.');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        if (error.errors) {
            const errorMessages = Object.values(error.errors).flat().join('<br>');
            toastr.error(errorMessages);
        } else if (error.message) {
            toastr.error(error.message);
        } else {
            toastr.error('An error occurred. Please try again.');
        }
    })
    .finally(() => {
        confirmDeleteBtn.disabled = false;
        confirmDeleteBtn.innerHTML = '<i class="fas fa-trash mr-2"></i>Delete';
        projectIdToDelete = null;
    });
});

// ========== CERTIFICATIONS FUNCTIONS ==========

// Save Certification (Add or Update)
document.getElementById('saveCertificationBtn').addEventListener('click', function() {
    const certificationId = document.getElementById('certificationId').value;
    const certification_name = document.getElementById('certification_name').value.trim();
    const issuing_organization = document.getElementById('issuing_organization').value.trim();
    const issue_date = document.getElementById('issue_date').value;
    const expiry_date = document.getElementById('expiry_date').value;
    const credential_id = document.getElementById('credential_id').value.trim();
    const credential_url = document.getElementById('credential_url').value.trim();

    if (!certification_name || !issuing_organization) {
        toastr.warning('Please fill in all required fields.');
        return;
    }

    // Disable button and show loading
    const saveBtn = this;
    saveBtn.disabled = true;
    saveBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Saving...';

    const url = certificationId
        ? '<?php echo e(route("admin.career.certification.update")); ?>'
        : '<?php echo e(route("admin.career.certification.add")); ?>';

    const formData = {
        name: certification_name,
        issuing_organization: issuing_organization,
        issue_date: issue_date,
        expiry_date: expiry_date,
        credential_id: credential_id,
        credential_url: credential_url
    };

    if (certificationId) {
        formData.id = certificationId;
    }

    fetch(url, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>'
        },
        body: JSON.stringify(formData)
    })
    .then(response => {
        if (!response.ok) {
            return response.json().then(err => {
                throw { status: response.status, data: err };
            });
        }
        return response.json();
    })
    .then(data => {
        if (data.success) {
            toastr.success(data.message);
            window.certificationsData = data.certifications;
            renderCertificationsList();
            $('#addCertificationModal').modal('hide');
        } else {
            toastr.error(data.message || 'Failed to save certification. Please try again.');
        }
    })
    .catch(error => {
        if (error.data && error.data.errors) {
            const errorMessages = Object.values(error.data.errors).flat().join('<br>');
            toastr.error(errorMessages, 'Validation Error', {enableHtml: true, timeOut: 5000});
        } else if (error.data && error.data.message) {
            toastr.error(error.data.message);
        } else {
            console.error('Error:', error);
            toastr.error('An error occurred. Please try again.');
        }
    })
    .finally(() => {
        saveBtn.disabled = false;
        saveBtn.innerHTML = '<i class="fas fa-save mr-2"></i>Save Certification';
    });
});

// Reset form when modal is hidden
$('#addCertificationModal').on('hidden.bs.modal', function() {
    document.getElementById('certificationForm').reset();
    document.getElementById('certificationId').value = '';
    document.getElementById('certificationModalTitle').textContent = 'Add Certification';
});

// Render Certifications List
function renderCertificationsList() {
    const certificationsList = document.getElementById('certificationsList');

    if (!window.certificationsData || window.certificationsData.length === 0) {
        certificationsList.innerHTML = `
            <div class="empty-state">
                <i class="fas fa-certificate"></i>
                <p>No certifications added yet. Click "Add Certification" to get started!</p>
            </div>
        `;
        return;
    }

    certificationsList.innerHTML = window.certificationsData.map(cert => {
        let dateInfo = '';
        if (cert.issue_date) {
            const issueDate = new Date(cert.issue_date);
            dateInfo = `Issued: ${issueDate.toLocaleDateString('en-US', {month: 'short', year: 'numeric'})}`;

            if (cert.expiry_date) {
                const expiryDate = new Date(cert.expiry_date);
                const now = new Date();
                const isExpired = expiryDate < now;
                dateInfo += ` | Expires: ${expiryDate.toLocaleDateString('en-US', {month: 'short', year: 'numeric'})}`;
                if (isExpired) {
                    dateInfo += ' <span class="badge badge-danger">Expired</span>';
                }
            }
        }

        return `
            <div class="item-card" data-id="${cert.id}">
                <div class="item-header">
                    <div>
                        <h5 class="item-title">${cert.name}</h5>
                        <p class="item-subtitle mb-1">${cert.issuing_organization}</p>
                        <div class="item-meta">
                            ${dateInfo ? `<span><i class="fas fa-calendar mr-1"></i>${dateInfo}</span>` : ''}
                            ${cert.credential_id ? `<span><i class="fas fa-id-badge mr-1"></i>ID: ${cert.credential_id}</span>` : ''}
                            ${cert.credential_url ? `<span><i class="fas fa-link mr-1"></i><a href="${cert.credential_url}" target="_blank">View Credential</a></span>` : ''}
                        </div>
                    </div>
                    <div class="item-actions d-flex gap-2">
                        <button class="btn-icon btn-edit" onclick="editCertification('${cert.id}')"><i class="fas fa-edit"></i></button>
                        <button class="btn-icon btn-delete" onclick="deleteCertification('${cert.id}')"><i class="fas fa-trash"></i></button>
                    </div>
                </div>
            </div>
        `;
    }).join('');
}

// Edit Certification (Global function for onclick)
window.editCertification = function(id) {
    const cert = window.certificationsData.find(c => String(c.id) === String(id));

    if (!cert) {
        toastr.error('Certification not found!');
        return;
    }

    // Populate form fields
    document.getElementById('certificationId').value = cert.id;
    document.getElementById('certification_name').value = cert.name || '';
    document.getElementById('issuing_organization').value = cert.issuing_organization || '';
    document.getElementById('issue_date').value = cert.issue_date || '';
    document.getElementById('expiry_date').value = cert.expiry_date || '';
    document.getElementById('credential_id').value = cert.credential_id || '';
    document.getElementById('credential_url').value = cert.credential_url || '';

    // Update modal title
    document.getElementById('certificationModalTitle').textContent = 'Edit Certification';

    // Show modal with slight delay
    setTimeout(() => {
        $('#addCertificationModal').modal('show');
    }, 100);
};

// Delete Certification (Global function for onclick)
window.deleteCertification = function(id) {
    certificationIdToDelete = id;
    $('#deleteCertificationModal').modal('show');
};

// Confirm Delete Certification
document.getElementById('confirmDeleteCertificationBtn').addEventListener('click', function() {
    if (!certificationIdToDelete) return;

    // Disable button and show loading
    const confirmDeleteBtn = this;
    confirmDeleteBtn.disabled = true;
    confirmDeleteBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Deleting...';

    fetch('<?php echo e(route("admin.career.certification.delete")); ?>', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>'
        },
        body: JSON.stringify({ id: certificationIdToDelete })
    })
    .then(response => {
        if (!response.ok) {
            return response.json().then(err => {
                throw { status: response.status, data: err };
            });
        }
        return response.json();
    })
    .then(data => {
        if (data.success) {
            toastr.success(data.message);
            window.certificationsData = window.certificationsData.filter(c => c.id !== certificationIdToDelete);
            renderCertificationsList();

            // Close modal
            $('#deleteCertificationModal').modal('hide');
        } else {
            toastr.error(data.message || 'Failed to delete certification. Please try again.');
        }
    })
    .catch(error => {
        if (error.data && error.data.errors) {
            const errorMessages = Object.values(error.data.errors).flat().join('<br>');
            toastr.error(errorMessages, 'Validation Error', {enableHtml: true, timeOut: 5000});
        } else if (error.data && error.data.message) {
            toastr.error(error.data.message);
        } else {
            console.error('Error:', error);
            toastr.error('An error occurred. Please try again.');
        }
    })
    .finally(() => {
        confirmDeleteBtn.disabled = false;
        confirmDeleteBtn.innerHTML = '<i class="fas fa-trash mr-2"></i>Delete';
        certificationIdToDelete = null;
    });
});

// Initialize on page load
renderCertificationsList();

// ========== LANGUAGES FUNCTIONS ==========

// Save Language (Add or Update)
document.getElementById('saveLanguageBtn').addEventListener('click', function() {
    const languageId = document.getElementById('languageId').value;
    const language_name = document.getElementById('language_name').value.trim();
    const language_proficiency = document.getElementById('language_proficiency').value;

    if (!language_name || !language_proficiency) {
        toastr.warning('Please fill in all required fields.');
        return;
    }

    // Disable button and show loading
    const saveBtn = this;
    saveBtn.disabled = true;
    saveBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Saving...';

    const url = languageId
        ? '<?php echo e(route("admin.career.language.update")); ?>'
        : '<?php echo e(route("admin.career.language.add")); ?>';

    const formData = {
        name: language_name,
        proficiency_level: language_proficiency
    };

    if (languageId) {
        formData.id = languageId;
    }

    fetch(url, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>'
        },
        body: JSON.stringify(formData)
    })
    .then(response => {
        if (!response.ok) {
            return response.json().then(err => {
                throw { status: response.status, data: err };
            });
        }
        return response.json();
    })
    .then(data => {
        if (data.success) {
            toastr.success(data.message);
            window.languagesData = data.languages;
            renderLanguagesList();
            $('#addLanguageModal').modal('hide');
        } else {
            toastr.error(data.message || 'Failed to save language. Please try again.');
        }
    })
    .catch(error => {
        if (error.data && error.data.errors) {
            const errorMessages = Object.values(error.data.errors).flat().join('<br>');
            toastr.error(errorMessages, 'Validation Error', {enableHtml: true, timeOut: 5000});
        } else if (error.data && error.data.message) {
            toastr.error(error.data.message);
        } else {
            console.error('Error:', error);
            toastr.error('An error occurred. Please try again.');
        }
    })
    .finally(() => {
        saveBtn.disabled = false;
        saveBtn.innerHTML = '<i class="fas fa-save mr-2"></i>Save Language';
    });
});

// Reset form when modal is hidden
$('#addLanguageModal').on('hidden.bs.modal', function() {
    document.getElementById('languageForm').reset();
    document.getElementById('languageId').value = '';
    document.getElementById('languageModalTitle').textContent = 'Add Language';
});

// Render Languages List
function renderLanguagesList() {
    const languagesList = document.getElementById('languagesList');

    if (!window.languagesData || window.languagesData.length === 0) {
        languagesList.innerHTML = `
            <div class="empty-state">
                <i class="fas fa-language"></i>
                <p>No languages added yet. Click "Add Language" to get started!</p>
            </div>
        `;
        return;
    }

    const languagesHtml = window.languagesData.map(lang => {
        return `
            <div class="col-md-4 mb-3">
                <div class="item-card" data-id="${lang.id}">
                    <div class="d-flex justify-content-between align-items-center">
                        <h6 class="mb-1"><strong>${lang.name}</strong></h6>
                        <div>
                            <button class="btn-icon btn-edit btn-sm" onclick="editLanguage('${lang.id}')"><i class="fas fa-edit"></i></button>
                            <button class="btn-icon btn-delete btn-sm ml-1" onclick="deleteLanguage('${lang.id}')"><i class="fas fa-trash"></i></button>
                        </div>
                    </div>
                    <p class="text-muted mb-0">${lang.proficiency_level}</p>
                </div>
            </div>
        `;
    }).join('');

    languagesList.innerHTML = '<div class="row">' + languagesHtml + '</div>';
}

// Edit Language (Global function for onclick)
window.editLanguage = function(id) {
    const lang = window.languagesData.find(l => String(l.id) === String(id));

    if (!lang) {
        toastr.error('Language not found!');
        return;
    }

    // Populate form fields
    document.getElementById('languageId').value = lang.id;
    document.getElementById('language_name').value = lang.name || '';
    document.getElementById('language_proficiency').value = lang.proficiency_level || '';

    // Update modal title
    document.getElementById('languageModalTitle').textContent = 'Edit Language';

    // Show modal with slight delay
    setTimeout(() => {
        $('#addLanguageModal').modal('show');
    }, 100);
};

// Delete Language (Global function for onclick)
window.deleteLanguage = function(id) {
    languageIdToDelete = id;
    $('#deleteLanguageModal').modal('show');
};

// Confirm Delete Language
document.getElementById('confirmDeleteLanguageBtn').addEventListener('click', function() {
    if (!languageIdToDelete) return;

    // Disable button and show loading
    const confirmDeleteBtn = this;
    confirmDeleteBtn.disabled = true;
    confirmDeleteBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Deleting...';

    fetch('<?php echo e(route("admin.career.language.delete")); ?>', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>'
        },
        body: JSON.stringify({ id: languageIdToDelete })
    })
    .then(response => {
        if (!response.ok) {
            return response.json().then(err => {
                throw { status: response.status, data: err };
            });
        }
        return response.json();
    })
    .then(data => {
        if (data.success) {
            toastr.success(data.message);
            window.languagesData = window.languagesData.filter(l => l.id !== languageIdToDelete);
            renderLanguagesList();

            // Close modal
            $('#deleteLanguageModal').modal('hide');
        } else {
            toastr.error(data.message || 'Failed to delete language. Please try again.');
        }
    })
    .catch(error => {
        if (error.data && error.data.errors) {
            const errorMessages = Object.values(error.data.errors).flat().join('<br>');
            toastr.error(errorMessages, 'Validation Error', {enableHtml: true, timeOut: 5000});
        } else if (error.data && error.data.message) {
            toastr.error(error.data.message);
        } else {
            console.error('Error:', error);
            toastr.error('An error occurred. Please try again.');
        }
    })
    .finally(() => {
        confirmDeleteBtn.disabled = false;
        confirmDeleteBtn.innerHTML = '<i class="fas fa-trash mr-2"></i>Delete';
        languageIdToDelete = null;
    });
});

// Initialize on page load
renderLanguagesList();

// ========== PROFESSIONAL LINKS SECTION ==========
// Platform icon mapping
const platformIcons = {
    'LinkedIn': 'fab fa-linkedin-in',
    'GitHub': 'fab fa-github',
    'Portfolio': 'fas fa-globe',
    'Twitter': 'fab fa-twitter',
    'Facebook': 'fab fa-facebook-f',
    'Instagram': 'fab fa-instagram',
    'Stack Overflow': 'fab fa-stack-overflow',
    'Medium': 'fab fa-medium-m',
    'YouTube': 'fab fa-youtube',
    'Behance': 'fab fa-behance',
    'Dribbble': 'fab fa-dribbble',
    'GitLab': 'fab fa-gitlab',
    'Bitbucket': 'fab fa-bitbucket',
    'CodePen': 'fab fa-codepen',
    'Discord': 'fab fa-discord',
    'Telegram': 'fab fa-telegram-plane',
    'WhatsApp': 'fab fa-whatsapp',
    'Reddit': 'fab fa-reddit-alien',
    'TikTok': 'fab fa-tiktok',
    'Twitch': 'fab fa-twitch',
    'Other': 'fas fa-link'
};

// Auto-update icon when platform is selected
const professionalPlatformSelect = document.getElementById('professional_platform');
if (professionalPlatformSelect) {
    professionalPlatformSelect.addEventListener('change', function() {
    const platform = this.value;
    const iconField = document.getElementById('professional_icon');
    if (platform && platformIcons[platform]) {
        iconField.value = platformIcons[platform];
    } else {
        iconField.value = 'fas fa-link';
    }
    });
}

// Save Professional Link (Add/Edit)
const saveSocialLinkBtn = document.getElementById('saveSocialLinkBtn');
if (saveSocialLinkBtn) {
    saveSocialLinkBtn.addEventListener('click', function() {
    const linkId = document.getElementById('professionalLinkId').value;
    const platform = document.getElementById('professional_platform').value.trim();
    const url = document.getElementById('professional_url').value.trim();
    const icon = document.getElementById('professional_icon').value.trim() || 'fas fa-link';

    // Validate required fields
    if (!platform || !url) {
        toastr.warning('Please fill in all required fields.');
        return;
    }

    // Validate URL format
    try {
        new URL(url);
    } catch (e) {
        toastr.error('Please enter a valid URL starting with http:// or https://');
        return;
    }

    // Disable button and show loading
    const saveBtn = this;
    saveBtn.disabled = true;
    saveBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Saving...';

    // Determine if adding or updating
    const isEditing = !!linkId;
    const endpoint = isEditing ? '<?php echo e(route("admin.career.link.update")); ?>' : '<?php echo e(route("admin.career.link.add")); ?>';
    const requestData = {
        platform: platform,
        url: url,
        icon: icon
    };

    if (isEditing) {
        requestData.id = linkId;
    }

    fetch(endpoint, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>'
        },
        body: JSON.stringify(requestData)
    })
    .then(response => {
        if (!response.ok) {
            return response.json().then(err => {
                throw { status: response.status, data: err };
            });
        }
        return response.json();
    })
    .then(data => {
        if (data.success) {
            toastr.success(data.message);
            console.log('Response data.professional_links:', data.professional_links);
            window.professionalLinksData = data.professional_links || [];
            console.log('Updated window.professionalLinksData:', window.professionalLinksData);
            renderProfessionalLinksList();

            // Close modal and reset form
            $('#addSocialLinkModal').modal('hide');
            document.getElementById('socialLinkForm').reset();
            document.getElementById('professionalLinkId').value = '';
        } else {
            toastr.error(data.message || 'Failed to save professional link. Please try again.');
        }
    })
    .catch(error => {
        if (error.data && error.data.errors) {
            const errorMessages = Object.values(error.data.errors).flat().join('<br>');
            toastr.error(errorMessages, 'Validation Error', {enableHtml: true, timeOut: 5000});
        } else if (error.data && error.data.message) {
            toastr.error(error.data.message);
        } else {
            console.error('Error:', error);
            toastr.error('An error occurred. Please try again.');
        }
    })
    .finally(() => {
        saveBtn.disabled = false;
        saveBtn.innerHTML = '<i class="fas fa-save mr-2"></i>Save Link';
    });
    });
}

// Render Professional Links List
function renderProfessionalLinksList() {
    const listContainer = document.getElementById('socialLinksList');

    // Ensure data is an array
    if (!Array.isArray(window.professionalLinksData)) {
        window.professionalLinksData = [];
    }

    if (!window.professionalLinksData || window.professionalLinksData.length === 0) {
        listContainer.innerHTML = `
            <div class="empty-state text-center py-5">
                <i class="fas fa-link fa-3x text-muted mb-3"></i>
                <p class="text-muted">No professional links added yet. Click "Add Link" to get started.</p>
            </div>
        `;
        return;
    }

    let html = '<div class="row">';

    window.professionalLinksData.forEach(link => {
        // Get platform class for styling (lowercase)
        const platformClass = link.platform ? link.platform.toLowerCase().replace(/\s+/g, '-') : '';

        html += `
            <div class="col-md-6 mb-3">
                <div class="item-card">
                    <div class="d-flex align-items-center">
                        <div class="social-icon ${platformClass}">
                            <i class="${link.icon || 'fas fa-link'}"></i>
                        </div>
                        <div class="social-link-content flex-grow-1">
                            <h6 class="mb-0"><strong>${link.platform}</strong></h6>
                            <small class="text-muted text-truncate d-block" style="max-width: 250px;">
                                <a href="${link.url}" target="_blank" class="text-muted">${link.url}</a>
                            </small>
                        </div>
                        <div class="social-link-actions ml-auto">
                            <button class="btn-icon btn-edit" onclick="editProfessionalLink('${link.id}')" title="Edit">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button class="btn-icon btn-delete" onclick="deleteProfessionalLink('${link.id}')" title="Delete">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        `;
    });

    html += '</div>';
    listContainer.innerHTML = html;
}

// Edit Professional Link (Global function for onclick)
window.editProfessionalLink = function(id) {
    const link = window.professionalLinksData.find(l => String(l.id) === String(id));

    if (!link) {
        toastr.error('Professional link not found!');
        return;
    }

    // Populate form fields
    document.getElementById('professionalLinkId').value = link.id;

    // Try to find platform in dropdown, or use stored platform
    const platformSelect = document.getElementById('professional_platform');
    const platformOptions = Array.from(platformSelect.options).map(opt => opt.value);

    // Check if the stored platform exists in dropdown
    if (platformOptions.includes(link.platform)) {
        platformSelect.value = link.platform;
    } else {
        // If not found, try to reverse-map from icon
        const reversePlatform = Object.keys(platformIcons).find(key => platformIcons[key] === link.icon);
        if (reversePlatform && platformOptions.includes(reversePlatform)) {
            platformSelect.value = reversePlatform;
        } else {
            platformSelect.value = 'Other';
        }
    }

    document.getElementById('professional_url').value = link.url || '';
    document.getElementById('professional_icon').value = link.icon || platformIcons[platformSelect.value] || 'fas fa-link';

    // Update modal title
    document.getElementById('socialLinkModalTitle').textContent = 'Edit Professional Link';

    // Show modal with slight delay
    setTimeout(() => {
        $('#addSocialLinkModal').modal('show');
    }, 100);
};

// Delete Professional Link (Global function for onclick)
window.deleteProfessionalLink = function(id) {
    professionalLinkIdToDelete = id;
    $('#deleteProfessionalLinkModal').modal('show');
};

// Confirm Delete Professional Link
document.getElementById('confirmDeleteProfessionalLinkBtn').addEventListener('click', function() {
    if (!professionalLinkIdToDelete) return;

    // Disable button and show loading
    const confirmDeleteBtn = this;
    confirmDeleteBtn.disabled = true;
    confirmDeleteBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Deleting...';

    fetch('<?php echo e(route("admin.career.link.delete")); ?>', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>'
        },
        body: JSON.stringify({ id: professionalLinkIdToDelete })
    })
    .then(response => {
        if (!response.ok) {
            return response.json().then(err => {
                throw { status: response.status, data: err };
            });
        }
        return response.json();
    })
    .then(data => {
        if (data.success) {
            toastr.success(data.message);
            window.professionalLinksData = window.professionalLinksData.filter(l => l.id !== professionalLinkIdToDelete);
            renderProfessionalLinksList();

            // Close modal
            $('#deleteProfessionalLinkModal').modal('hide');
        } else {
            toastr.error(data.message || 'Failed to delete professional link. Please try again.');
        }
    })
    .catch(error => {
        if (error.data && error.data.errors) {
            const errorMessages = Object.values(error.data.errors).flat().join('<br>');
            toastr.error(errorMessages, 'Validation Error', {enableHtml: true, timeOut: 5000});
        } else if (error.data && error.data.message) {
            toastr.error(error.data.message);
        } else {
            console.error('Error:', error);
            toastr.error('An error occurred. Please try again.');
        }
    })
    .finally(() => {
        confirmDeleteBtn.disabled = false;
        confirmDeleteBtn.innerHTML = '<i class="fas fa-trash mr-2"></i>Delete';
        professionalLinkIdToDelete = null;
    });
});

// Reset Professional Link form when modal is closed
if ($('#addSocialLinkModal').length) {
    $('#addSocialLinkModal').on('hidden.bs.modal', function () {
        document.getElementById('socialLinkForm').reset();
        document.getElementById('professionalLinkId').value = '';
        document.getElementById('professional_icon').value = '';
        document.getElementById('socialLinkModalTitle').textContent = 'Add Professional Link';
    });
}

// Initialize on page load
console.log('Professional Links Data:', window.professionalLinksData);
renderProfessionalLinksList();

</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.default', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragonUpdated\www\rr-app\resources\views/backend/pages/career/index.blade.php ENDPATH**/ ?>