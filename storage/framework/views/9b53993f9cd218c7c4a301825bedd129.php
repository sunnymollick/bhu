<?php $__env->startSection('title', 'News - Bengali Hindu Unity'); ?>

<?php $__env->startSection('stylesheet'); ?>
<style>
    /* Professional News Portal Styles */
    /* Premium News Card Styles */
    .sigma_post {
        background: #fff;
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 4px 20px rgba(0,0,0,0.08);
        transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
        height: 100%;
        display: flex;
        flex-direction: column;
        border: 1px solid rgba(126, 69, 85, 0.1);
        position: relative;
    }

    .sigma_post::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(90deg, #7E4555 0%, #f60 50%, #7E4555 100%);
        transform: scaleX(0);
        transition: transform 0.5s ease;
    }

    .sigma_post:hover::before {
        transform: scaleX(1);
    }

    .sigma_post:hover {
        transform: translateY(-12px);
        box-shadow: 0 20px 60px rgba(126, 69, 85, 0.25);
        border-color: rgba(126, 69, 85, 0.2);
    }

    .sigma_post-thumb {
        width: 100%;
        height: 280px;
        overflow: hidden;
        position: relative;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    }

    .sigma_post-thumb::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(135deg, rgba(126, 69, 85, 0.9) 0%, rgba(255, 102, 0, 0.7) 100%);
        opacity: 0;
        transition: opacity 0.5s ease;
        z-index: 2;
    }

    .sigma_post:hover .sigma_post-thumb::before {
        opacity: 0.3;
    }

    .sigma_post-thumb img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.7s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .sigma_post:hover .sigma_post-thumb img {
        transform: scale(1.2) rotate(2deg);
    }

    /* Premium Category Badge */
    .news-category-badge {
        position: absolute;
        top: 20px;
        left: 20px;
        background: linear-gradient(135deg, #f60 0%, #e55 100%);
        color: #fff;
        padding: 8px 18px;
        border-radius: 25px;
        font-size: 11px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 1px;
        box-shadow: 0 6px 20px rgba(255, 102, 0, 0.5);
        z-index: 10;
        backdrop-filter: blur(10px);
        border: 2px solid rgba(255,255,255,0.2);
        transition: all 0.3s ease;
    }

    .news-category-badge:hover {
        transform: scale(1.05) translateY(-2px);
        box-shadow: 0 8px 25px rgba(255, 102, 0, 0.6);
    }

    .news-category-badge i {
        margin-right: 4px;
        animation: bounce 2s infinite;
    }

    @keyframes bounce {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-3px); }
    }

    /* Read More Button on Hover */
    .read-more-overlay {
        position: absolute;
        bottom: -60px;
        left: 50%;
        transform: translateX(-50%);
        background: linear-gradient(135deg, #f60 0%, #e55 100%);
        color: #fff;
        padding: 12px 30px;
        border-radius: 30px;
        font-size: 13px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        box-shadow: 0 8px 25px rgba(255, 102, 0, 0.4);
        z-index: 11;
        transition: all 0.4s ease;
        opacity: 0;
        white-space: nowrap;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .sigma_post:hover .read-more-overlay {
        bottom: 20px;
        opacity: 1;
    }

    .read-more-overlay i {
        transition: transform 0.3s;
    }

    .read-more-overlay:hover i {
        transform: translateX(5px);
    }

    .sigma_post-body {
        padding: 30px;
        flex: 1;
        display: flex;
        flex-direction: column;
        background: #fff;
        position: relative;
    }

    .sigma_post-body::before {
        content: '';
        position: absolute;
        top: 0;
        left: 30px;
        right: 30px;
        height: 1px;
        background: linear-gradient(90deg, transparent 0%, #7E4555 50%, transparent 100%);
        opacity: 0.3;
    }

    .sigma_post-meta {
        display: flex;
        align-items: center;
        gap: 12px;
        margin-bottom: 20px;
        margin-top: 15px;
        flex-wrap: wrap;
    }

    .sigma_post-meta > div {
        display: flex;
        align-items: center;
        gap: 6px;
        background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        padding: 8px 14px;
        border-radius: 20px;
        transition: all 0.3s;
        border: 1px solid #e9ecef;
    }

    .sigma_post-meta > div:hover {
        background: linear-gradient(135deg, #fff3e0 0%, #ffe0b2 100%);
        transform: translateY(-3px);
        box-shadow: 0 4px 12px rgba(255, 102, 0, 0.2);
        border-color: #f60;
    }

    .sigma_post-meta a {
        color: #555;
        font-size: 13px;
        font-weight: 600;
        transition: color 0.3s;
    }

    .sigma_post-meta a:hover {
        color: #f60;
    }

    .sigma_post-meta i {
        color: #f60;
        font-size: 14px;
    }

    /* Premium Read Time Indicator */
    .read-time {
        display: flex;
        align-items: center;
        gap: 6px;
        color: #555;
        font-size: 13px;
        font-weight: 600;
        background: linear-gradient(135deg, #e8f5e9 0%, #c8e6c9 100%);
        padding: 8px 14px;
        border-radius: 20px;
        border: 1px solid #c8e6c9;
        transition: all 0.3s;
    }

    .read-time:hover {
        background: linear-gradient(135deg, #c8e6c9 0%, #a5d6a7 100%);
        transform: translateY(-3px);
        box-shadow: 0 4px 12px rgba(76, 175, 80, 0.2);
    }

    .read-time i {
        color: #4caf50;
    }

    .sigma_post h5 {
        margin-bottom: 15px;
        flex: 1;
    }

    .sigma_post h5 a {
        color: #1a1a1a;
        font-size: 22px;
        font-weight: 800;
        line-height: 1.4;
        transition: all 0.3s;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-decoration: none;
        background: linear-gradient(to right, #f60, #7E4555);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        background-size: 0% 100%;
        background-repeat: no-repeat;
        transition: background-size 0.5s ease;
    }

    .sigma_post h5 a {
        background: none;
        -webkit-text-fill-color: #1a1a1a;
    }

    .sigma_post:hover h5 a {
        color: #d86800;
        -webkit-text-fill-color: #d86800;
    }

    /* Premium News Excerpt */
    .news-excerpt {
        color: #666;
        font-size: 15px;
        line-height: 1.8;
        margin-bottom: 20px;
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-align: justify;
        position: relative;
        padding-left: 15px;
        border-left: 3px solid #f60;
    }

    .sigma_post-single-author {
        margin-top: auto;
        padding-top: 20px;
        border-top: 2px solid #f8f9fa;
        position: relative;
    }

    .sigma_post-single-author::before {
        content: '';
        position: absolute;
        top: -2px;
        left: 0;
        width: 60px;
        height: 2px;
        background: linear-gradient(90deg, #7E4555 0%, #f60 100%);
    }

    .author-info-wrapper {
        display: flex;
        flex-direction: column;
        gap: 15px;
    }

    .author-info {
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .sigma_post-single-author img {
        width: 48px;
        height: 48px;
        border-radius: 50%;
        object-fit: cover;
        border: 3px solid #f60;
        transition: all 0.4s;
        box-shadow: 0 4px 12px rgba(255, 102, 0, 0.2);
    }

    .sigma_post:hover .sigma_post-single-author img {
        transform: scale(1.15) rotate(5deg);
        box-shadow: 0 6px 20px rgba(255, 102, 0, 0.4);
        border-color: #7E4555;
    }

    .sigma_post-single-author-content {
        display: flex;
        flex-direction: column;
        gap: 8px;
    }

    .sigma_post-single-author-content p {
        margin: 0;
        color: #1a1a1a;
        font-weight: 700;
        font-size: 15px;
        display: flex;
        align-items: center;
        gap: 6px;
    }

    .sigma_post-single-author-content p::before {
        content: '✍️';
        font-size: 14px;
    }

    .sigma_post-single-author-content span {
        color: #fff;
        font-size: 11px;
        font-weight: 600;
        display: inline-flex;
        align-items: center;
        gap: 5px;
        background: linear-gradient(135deg, #f60 0%, #e55 100%);
        padding: 6px 12px;
        border-radius: 20px;
        width: fit-content;
        box-shadow: 0 2px 8px rgba(255, 102, 0, 0.3);
        transition: all 0.3s;
    }

    .sigma_post-single-author-content span::before {
        content: '🕐';
        font-size: 12px;
    }

    .sigma_post:hover .sigma_post-single-author-content span {
        transform: translateX(3px);
        box-shadow: 0 4px 12px rgba(255, 102, 0, 0.4);
    }

    /* Premium Engagement Stats */
    .engagement-stats {
        display: flex;
        gap: 12px;
        align-items: center;
        flex-wrap: wrap;
    }

    .engagement-stats .stat {
        display: flex;
        align-items: center;
        gap: 5px;
        color: #666;
        font-size: 13px;
        font-weight: 600;
        background: #f8f9fa;
        padding: 6px 12px;
        border-radius: 15px;
        transition: all 0.3s;
        border: 1px solid #e9ecef;
    }

    .engagement-stats .stat:hover {
        background: linear-gradient(135deg, #7E4555 0%, #5c3943 100%);
        color: #fff;
        transform: scale(1.1);
        box-shadow: 0 4px 12px rgba(126, 69, 85, 0.3);
    }

    .engagement-stats .stat i {
        color: #f60;
        font-size: 14px;
        transition: all 0.3s;
    }

    .engagement-stats .stat:hover i {
        color: #fff;
        transform: scale(1.2);
    }

    /* Professional Sidebar Styles */
    .sidebar .widget,
    .sidebar .sidebar-widget {
        background: #fff;
        padding: 30px;
        border-radius: 12px;
        box-shadow: 0 3px 15px rgba(0,0,0,0.08);
        margin-bottom: 30px;
        border: 1px solid rgba(0,0,0,0.05);
        transition: all 0.3s;
    }

    .sidebar .widget:hover,
    .sidebar .sidebar-widget:hover {
        box-shadow: 0 8px 25px rgba(0,0,0,0.12);
        transform: translateY(-3px);
    }

    .widget-title {
        font-size: 22px;
        font-weight: 700;
        margin-bottom: 25px;
        padding-bottom: 15px;
        border-bottom: 3px solid #d86800;
        color: #1a1a1a;
        position: relative;
    }

    .widget-title::before {
        background: #d86800 !important;
    }

    .widget-title::after {
        content: '';
        position: absolute;
        bottom: -3px;
        left: 0;
        width: 50px;
        height: 3px;
        background: #d86800;
    }

    /* News Autocomplete Styles */
    .sidebar-widget.widget-search {
        position: relative;
        overflow: visible !important;
        z-index: 100;
    }

    .sigma_search-adv-input {
        position: relative;
    }

    .news-autocomplete-list {
        position: absolute;
        top: 100%;
        left: 0;
        right: 0;
        background: white;
        border: 1px solid #ddd;
        border-top: none;
        border-radius: 0 0 8px 8px;
        list-style: none;
        margin: 0;
        padding: 0;
        max-height: 400px;
        overflow-y: auto;
        z-index: 10000 !important;
        box-shadow: 0 8px 30px rgba(0,0,0,0.2);
        display: none;
    }

    .news-autocomplete-list li {
        padding: 14px 18px;
        cursor: pointer;
        border-bottom: 1px solid #f5f5f5;
        transition: all 0.25s ease;
        background: #fff;
        display: flex;
        flex-direction: column;
        gap: 6px;
    }

    .news-autocomplete-list li:last-child {
        border-bottom: none;
        border-radius: 0 0 8px 8px;
    }

    .news-autocomplete-list li:hover,
    .news-autocomplete-list li.active {
        background: linear-gradient(to right, #fff8f0 0%, #ffffff 100%);
        padding-left: 24px;
    }

    .news-autocomplete-list .news-title {
        font-weight: 600;
        color: #2c3e50;
        margin: 0;
        font-size: 14px;
        line-height: 1.5;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .news-autocomplete-list li:hover .news-title {
        color: #d86800;
    }

    .news-autocomplete-list .news-meta {
        font-size: 12px;
        color: #7f8c8d;
        display: flex;
        align-items: center;
        gap: 12px;
        flex-wrap: wrap;
    }

    .news-autocomplete-list .news-meta span {
        display: flex;
        align-items: center;
        gap: 5px;
    }

    .news-autocomplete-list .news-meta i {
        color: #d86800;
        font-size: 11px;
    }

    .news-autocomplete-list .no-results {
        padding: 30px 20px;
        text-align: center;
        color: #95a5a6;
        font-size: 14px;
        cursor: default;
    }

    .news-autocomplete-list .no-results:hover {
        background: white;
        padding-left: 20px;
    }

    .news-autocomplete-list .no-results i {
        font-size: 32px;
        margin-bottom: 10px;
        display: block;
        color: #d86800;
        opacity: 0.5;
    }

    .news-autocomplete-list::-webkit-scrollbar {
        width: 6px;
    }

    .news-autocomplete-list::-webkit-scrollbar-track {
        background: #f1f1f1;
        border-radius: 0 0 8px 0;
    }

    .news-autocomplete-list::-webkit-scrollbar-thumb {
        background: #d86800;
        border-radius: 3px;
    }

    .news-autocomplete-list::-webkit-scrollbar-thumb:hover {
        background: #b85700;
    }

    #news-search-input:focus {
        outline: none;
        border-color: #d86800;
        box-shadow: 0 0 0 0.2rem rgba(216, 104, 0, 0.25);
    }

    /* Square thumbnails for recent news */
    .sidebar-widget.widget-recent-posts .sigma_recent-post>a img {
        border-radius: 8px !important;
        width: 85px !important;
        height: 85px !important;
        object-fit: cover;
    }

    /* Recent news title hover color */
    .sigma_recent-post-body h6 a:hover {
        color: #d86800 !important;
    }

    /* Read More Button */
    .read-more-btn {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: #d86800;
        color: #fff;
        padding: 10px 24px;
        border-radius: 25px;
        font-size: 14px;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.3s ease;
        box-shadow: 0 4px 12px rgba(216, 104, 0, 0.3);
    }

    .read-more-btn:hover {
        background: #b85700;
        transform: translateY(-2px);
        box-shadow: 0 6px 16px rgba(216, 104, 0, 0.4);
        color: #fff;
    }

    .read-more-btn i {
        transition: transform 0.3s ease;
    }

    .read-more-btn:hover i {
        transform: translateX(3px);
    }

    /* Enhanced social icons */
    .widget-newsletter .sigma_sm-box {
        margin-top: 20px;
    }

    .widget-newsletter .sigma_sm {
        display: flex;
        justify-content: center;
        gap: 12px;
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .widget-newsletter .sigma_sm li a {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 45px;
        height: 45px;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border-radius: 10px;
        color: #fff;
        font-size: 18px;
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
    }

    .widget-newsletter .sigma_sm li:nth-child(1) a {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    }

    .widget-newsletter .sigma_sm li:nth-child(2) a {
        background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
        box-shadow: 0 4px 15px rgba(245, 87, 108, 0.3);
    }

    .widget-newsletter .sigma_sm li:nth-child(3) a {
        background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
        box-shadow: 0 4px 15px rgba(79, 172, 254, 0.3);
    }

    .widget-newsletter .sigma_sm li:nth-child(4) a {
        background: linear-gradient(135deg, #fa709a 0%, #fee140 100%);
        box-shadow: 0 4px 15px rgba(250, 112, 154, 0.3);
    }

    .widget-newsletter .sigma_sm li a:hover {
        transform: translateY(-5px) scale(1.05);
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
    }

    /* Custom search button color */
    .sidebar .sidebar-widget.widget-search .sigma_search-adv-input button {
        background-color: #d86800 !important;
        color: #fff !important;
    }

    .sidebar .sidebar-widget.widget-search .sigma_search-adv-input button:hover {
        background-color: #b85700 !important;
    }

    /* Search Suggestions */
    .search-suggestions {
        position: absolute;
        top: 100%;
        left: 0;
        right: 0;
        background: #ffffff;
        border: 1px solid #e0e0e0;
        border-radius: 0 0 8px 8px;
        box-shadow: 0 4px 16px rgba(0, 0, 0, 0.1);
        max-height: 400px;
        overflow-y: auto;
        z-index: 10000;
        display: none;
        margin-top: 0;
    }

    .search-suggestions.active {
        display: block;
        animation: slideDown 0.2s ease-out;
    }

    @keyframes slideDown {
        from {
            opacity: 0;
            transform: translateY(-10px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .suggestion-item {
        padding: 14px 18px;
        border-bottom: 1px solid #f5f5f5;
        cursor: pointer;
        transition: all 0.25s ease;
        background: #fff;
        display: flex;
        flex-direction: column;
        gap: 6px;
    }

    .suggestion-item:last-child {
        border-bottom: none;
        border-radius: 0 0 8px 8px;
    }

    .suggestion-item:hover {
        background: linear-gradient(to right, #fff8f0 0%, #ffffff 100%);
        padding-left: 24px;
    }

    .suggestion-title {
        font-weight: 600;
        color: #2c3e50;
        margin: 0;
        font-size: 14px;
        line-height: 1.5;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .suggestion-item:hover .suggestion-title {
        color: #d86800;
    }

    .suggestion-meta {
        font-size: 12px;
        color: #7f8c8d;
        display: flex;
        align-items: center;
        gap: 5px;
    }

    .suggestion-meta i {
        color: #d86800;
        font-size: 11px;
    }

    .no-suggestions {
        padding: 30px 20px;
        text-align: center;
        color: #95a5a6;
        font-size: 14px;
    }

    .no-suggestions i {
        font-size: 32px;
        margin-bottom: 10px;
        display: block;
        color: #d86800;
        opacity: 0.5;
    }

    .search-suggestions::-webkit-scrollbar {
        width: 6px;
    }

    .search-suggestions::-webkit-scrollbar-track {
        background: #f1f1f1;
        border-radius: 0 0 8px 0;
    }

    .search-suggestions::-webkit-scrollbar-thumb {
        background: #d86800;
        border-radius: 3px;
    }

    .search-suggestions::-webkit-scrollbar-thumb:hover {
        background: #b85700;
    }

    .sidebar-widget.widget-search {
        position: relative;
    }

    .sigma_search-adv-input {
        position: relative;
    }

    /* Popular Tags Styles */
    .popular-tags-widget .tagcloud {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        margin: 0;
        padding: 0;
    }

    .popular-tags-widget .tagcloud a {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        padding: 8px 16px;
        background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        color: #555;
        border: 2px solid #e9ecef;
        border-radius: 20px;
        font-size: 13px;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.3s ease;
        cursor: pointer;
    }

    .popular-tags-widget .tagcloud a:hover {
        background: linear-gradient(135deg, #d86800 0%, #b85700 100%);
        color: #fff !important;
        border-color: #d86800 !important;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(216, 104, 0, 0.3);
    }

    .popular-tags-widget .tagcloud a.active {
        background: linear-gradient(135deg, #d86800 0%, #b85700 100%);
        color: #fff !important;
        border-color: #d86800 !important;
        box-shadow: 0 4px 12px rgba(216, 104, 0, 0.3);
    }

    .popular-tags-widget .tagcloud a i {
        font-size: 11px;
        opacity: 0.8;
    }

    .popular-tags-widget .show-all-tags {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        padding: 8px 16px;
        background: linear-gradient(135deg, #7E4555 0%, #5c3943 100%);
        color: #fff;
        border: 2px solid #7E4555;
        border-radius: 20px;
        font-size: 13px;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.3s ease;
        cursor: pointer;
    }

    .popular-tags-widget .show-all-tags:hover {
        background: linear-gradient(135deg, #5c3943 0%, #4a2d35 100%);
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(126, 69, 85, 0.4);
    }

    .popular-tags-widget .tag-count {
        background: rgba(255, 255, 255, 0.2);
        padding: 2px 8px;
        border-radius: 10px;
        font-size: 11px;
        font-weight: 700;
    }

    .popular-tags-widget .clear-filter-btn {
        display: none;
        align-items: center;
        gap: 5px;
        padding: 8px 16px;
        background: linear-gradient(135deg, #dc3545 0%, #c82333 100%);
        color: #fff;
        border: 2px solid #dc3545;
        border-radius: 20px;
        font-size: 13px;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.3s ease;
        cursor: pointer;
    }

    .popular-tags-widget .clear-filter-btn.show {
        display: inline-flex;
    }

    .popular-tags-widget .clear-filter-btn:hover {
        background: linear-gradient(135deg, #c82333 0%, #a71d2a 100%);
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(220, 53, 69, 0.4);
    }

    .popular-tags-widget .clear-filter-btn i {
        font-size: 11px;
    }

    /* Pagination */
    .pagination {
        display: flex;
        justify-content: center;
        gap: 5px;
        list-style: none;
        padding: 0;
        margin-top: 40px;
    }

    .pagination .page-item .page-link {
        padding: 10px 15px;
        border: 1px solid #ddd;
        color: #666;
        border-radius: 5px;
        transition: all 0.3s;
    }

    .pagination .page-item.active .page-link {
        background: #f60;
        border-color: #f60;
        color: #fff;
    }

    .pagination .page-item .page-link:hover {
        background: #f60;
        border-color: #f60;
        color: #fff;
    }

    .pagination .page-item.disabled .page-link {
        opacity: 0.5;
        cursor: not-allowed;
    }

    /* Breaking News Ticker */
    .breaking-news {
        background: linear-gradient(135deg, #dc3545 0%, #c82333 100%);
        padding: 0;
        margin-bottom: 30px;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 5px 20px rgba(220, 53, 69, 0.3);
        display: flex;
        align-items: center;
    }

    .breaking-news-label {
        background: rgba(0,0,0,0.3);
        color: #fff;
        padding: 15px 25px;
        font-weight: 700;
        text-transform: uppercase;
        font-size: 13px;
        letter-spacing: 1px;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        white-space: nowrap;
        flex-shrink: 0;
    }

    .breaking-news-ticker {
        flex: 1;
        overflow: hidden;
        padding: 15px 0;
    }

    .breaking-news-content {
        display: inline-block;
        color: #fff;
        font-size: 15px;
        font-weight: 500;
        white-space: nowrap;
        padding-left: 100%;
        animation: scroll-left 20s linear infinite;
    }

    @keyframes scroll-left {
        0% {
            transform: translateX(0);
        }
        100% {
            transform: translateX(-100%);
        }
    }

    .breaking-news-content:hover {
        animation-play-state: paused;
    }

    /* Filter Section */
    .news-filters {
        background: #f8f9fa;
        padding: 20px;
        border-radius: 10px;
        margin-bottom: 30px;
        display: flex;
        align-items: center;
        gap: 15px;
        flex-wrap: wrap;
    }

    .filter-label {
        font-weight: 600;
        color: #333;
        font-size: 15px;
    }

    .filter-btn {
        padding: 8px 18px;
        border: 2px solid #ddd;
        background: #fff;
        color: #666;
        border-radius: 25px;
        font-size: 14px;
        font-weight: 500;
        transition: all 0.3s;
        cursor: pointer;
    }

    .filter-btn:hover,
    .filter-btn.active {
        background: #f60;
        border-color: #f60;
        color: #fff;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(255, 102, 0, 0.3);
    }



    /* ===== News Page — Responsive ===== */

    /* Small Laptop (≤1280px) */
    @media (max-width: 1280px) {
        .sigma_post-thumb {
            height: 240px;
        }
        .sigma_post-body {
            padding: 25px;
        }
        .sidebar .widget,
        .sidebar .sidebar-widget {
            padding: 25px;
        }
        .related-events-section {
            padding: 25px;
        }
    }

    /* Tablet Landscape (≤1024px) */
    @media (max-width: 1024px) {
        /* Flatten sidebar structure for reordering */
        .section > .container > .row {
            display: flex;
            flex-direction: column;
        }
        .section > .container > .row > .col-lg-4 {
            display: contents;
        }
        .section > .container > .row > .col-lg-4 > .sidebar {
            display: contents;
        }

        /* Mobile order: Search (1) → News Grid (2) → Recent News (3) → Popular Tags (4) */
        .sidebar-widget.widget-search {
            order: 1;
            width: 100%;
            margin-bottom: 25px;
        }
        .section > .container > .row > .col-lg-8 {
            order: 2;
            width: 100%;
        }
        .sidebar-widget.widget-recent-posts {
            order: 3;
            width: 100%;
            margin-bottom: 25px;
        }
        .sidebar-widget.popular-tags-widget {
            order: 4;
            width: 100%;
            margin-bottom: 25px;
        }

        /* Search bar alignment */
        .sigma_search-adv-input {
            display: flex;
            align-items: stretch;
        }
        .sigma_search-adv-input .form-control {
            flex: 1;
            min-width: 0;
            height: 50px;
        }
        .sigma_search-adv-input button {
            position: relative;
            top: auto;
            right: auto;
            transform: none;
            width: 50px;
            height: 50px;
            flex-shrink: 0;
        }

        .sigma_post-thumb {
            height: 220px;
        }
        .sigma_post-body {
            padding: 22px;
        }
        .sigma_post h5 a {
            font-size: 20px;
        }
        .news-excerpt {
            font-size: 14px;
            -webkit-line-clamp: 2;
        }
        .sidebar .widget,
        .sidebar .sidebar-widget {
            padding: 22px;
            margin-bottom: 22px;
        }
        .widget-title {
            font-size: 20px;
            margin-bottom: 20px;
        }
        .breaking-news-label {
            font-size: 12px;
            padding: 12px 18px;
        }
        .breaking-news-content {
            font-size: 14px;
        }
    }

    /* Tablet Portrait (≤768px) */
    @media (max-width: 768px) {
        .sigma_search-adv-input .form-control {
            height: 46px;
            font-size: 14px;
        }
        .sigma_search-adv-input button {
            width: 46px;
            height: 46px;
        }
        .sigma_post-thumb {
            height: 200px;
        }
        .sigma_post-body {
            padding: 20px;
        }
        .sigma_post-body::before {
            left: 20px;
            right: 20px;
        }
        .sigma_post h5 a {
            font-size: 18px;
        }
        .sigma_post-meta > div {
            padding: 6px 10px;
        }
        .sigma_post-meta a {
            font-size: 12px;
        }
        .news-excerpt {
            font-size: 13px;
            line-height: 1.6;
            padding-left: 12px;
            margin-bottom: 15px;
        }
        .read-more-btn {
            padding: 8px 18px;
            font-size: 13px;
        }
        .news-category-badge {
            font-size: 10px;
            padding: 6px 14px;
            top: 12px;
            left: 12px;
        }
        .engagement-stats {
            display: flex !important;
        }
        .engagement-stats .stat {
            padding: 5px 10px;
            font-size: 12px;
        }
        .breaking-news {
            border-radius: 8px;
            margin-bottom: 22px;
        }
        .breaking-news-label {
            font-size: 11px;
            padding: 12px 15px;
            letter-spacing: 0.5px;
        }
        .breaking-news-content {
            font-size: 13px;
        }
        .author-info-wrapper {
            gap: 10px;
        }
        .sigma_post-single-author img {
            width: 40px;
            height: 40px;
        }
        .sigma_post-single-author-content p {
            font-size: 13px;
        }
        .sigma_post-single-author-content span {
            font-size: 10px;
            padding: 5px 10px;
        }
        .sidebar .widget,
        .sidebar .sidebar-widget {
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 10px;
        }
        .widget-title {
            font-size: 18px;
            margin-bottom: 18px;
            padding-bottom: 12px;
        }
        .sidebar-widget.widget-recent-posts .sigma_recent-post>a img {
            width: 70px !important;
            height: 70px !important;
        }
        .popular-tags-widget .tagcloud {
            gap: 8px;
        }
        .popular-tags-widget .tagcloud a {
            padding: 6px 12px;
            font-size: 12px;
        }
        .popular-tags-widget .show-all-tags {
            padding: 6px 12px;
            font-size: 12px;
        }
        .pagination {
            margin-top: 30px;
            gap: 3px;
        }
        .pagination .page-item .page-link {
            padding: 8px 12px;
            font-size: 14px;
        }
        .read-time {
            padding: 6px 10px;
            font-size: 12px;
        }
    }

    /* Mobile L (≤425px) */
    @media (max-width: 425px) {
        .sigma_search-adv-input .form-control {
            height: 42px;
            font-size: 13px;
        }
        .sigma_search-adv-input button {
            width: 42px;
            height: 42px;
            font-size: 14px;
        }
        .sigma_post-thumb {
            height: 180px;
        }
        .sigma_post-body {
            padding: 16px;
        }
        .sigma_post-body::before {
            left: 16px;
            right: 16px;
        }
        .sigma_post h5 a {
            font-size: 16px;
            line-height: 1.35;
        }
        .sigma_post h5 {
            margin-bottom: 10px;
        }
        .sigma_post-meta {
            gap: 8px;
            margin-bottom: 12px;
            margin-top: 10px;
        }
        .sigma_post-meta > div {
            padding: 5px 8px;
            border-radius: 15px;
        }
        .sigma_post-meta a {
            font-size: 11px;
        }
        .sigma_post-meta i {
            font-size: 12px;
        }
        .news-excerpt {
            font-size: 13px;
            line-height: 1.5;
            padding-left: 10px;
            border-left-width: 2px;
            margin-bottom: 12px;
            -webkit-line-clamp: 2;
        }
        .news-category-badge {
            font-size: 9px;
            padding: 5px 10px;
            top: 10px;
            left: 10px;
            letter-spacing: 0.5px;
        }
        .read-more-overlay {
            padding: 8px 18px;
            font-size: 11px;
            border-radius: 20px;
        }
        .read-more-btn {
            padding: 8px 16px;
            font-size: 12px;
            gap: 6px;
        }
        .sigma_post-single-author {
            padding-top: 12px;
        }
        .sigma_post-single-author img {
            width: 36px;
            height: 36px;
            border-width: 2px;
        }
        .sigma_post-single-author-content p {
            font-size: 12px;
        }
        .sigma_post-single-author-content span {
            font-size: 10px;
            padding: 4px 8px;
        }
        .engagement-stats .stat {
            padding: 4px 8px;
            font-size: 11px;
            border-radius: 12px;
        }
        .engagement-stats {
            gap: 8px;
        }
        .breaking-news {
            border-radius: 6px;
            margin-bottom: 18px;
        }
        .breaking-news-label {
            font-size: 10px;
            padding: 10px 12px;
            gap: 5px;
        }
        .breaking-news-content {
            font-size: 12px;
            padding: 12px 0;
        }
        .sidebar .widget,
        .sidebar .sidebar-widget {
            padding: 16px;
            margin-bottom: 18px;
            border-radius: 8px;
        }
        .widget-title {
            font-size: 16px;
            margin-bottom: 15px;
            padding-bottom: 10px;
        }
        .sidebar-widget.widget-recent-posts .sigma_recent-post>a img {
            width: 65px !important;
            height: 65px !important;
        }
        .sigma_recent-post-body h6 a {
            font-size: 13px;
        }
        .popular-tags-widget .tagcloud {
            gap: 6px;
        }
        .popular-tags-widget .tagcloud a {
            padding: 5px 10px;
            font-size: 11px;
            border-radius: 15px;
        }
        .popular-tags-widget .tag-count {
            font-size: 10px;
            padding: 1px 6px;
        }
        .popular-tags-widget .show-all-tags {
            padding: 5px 10px;
            font-size: 11px;
        }
        .popular-tags-widget .clear-filter-btn {
            padding: 5px 10px;
            font-size: 11px;
        }
        .pagination .page-item .page-link {
            padding: 7px 10px;
            font-size: 13px;
        }
        .read-time {
            padding: 5px 8px;
            font-size: 11px;
        }
        .news-filters {
            padding: 15px;
            gap: 10px;
        }
        .filter-btn {
            padding: 6px 14px;
            font-size: 12px;
        }
        .filter-label {
            font-size: 13px;
        }
        /* Ensure news cards in single column */
        .col-lg-8 .row .col-md-6 {
            flex: 0 0 100%;
            max-width: 100%;
        }
    }

    /* Mobile M (≤375px) */
    @media (max-width: 375px) {
        .sigma_search-adv-input .form-control {
            height: 40px;
            font-size: 12px;
        }
        .sigma_search-adv-input button {
            width: 40px;
            height: 40px;
            font-size: 13px;
        }
        .sigma_post-thumb {
            height: 160px;
        }
        .sigma_post-body {
            padding: 14px;
        }
        .sigma_post h5 a {
            font-size: 15px;
        }
        .sigma_post-meta > div {
            padding: 4px 7px;
        }
        .sigma_post-meta a {
            font-size: 10px;
        }
        .news-excerpt {
            font-size: 12px;
            line-height: 1.5;
            -webkit-line-clamp: 2;
        }
        .news-category-badge {
            font-size: 8px;
            padding: 4px 8px;
            top: 8px;
            left: 8px;
        }
        .read-more-btn {
            padding: 7px 14px;
            font-size: 11px;
        }
        .sigma_post-single-author img {
            width: 32px;
            height: 32px;
        }
        .sigma_post-single-author-content p {
            font-size: 11px;
        }
        .sigma_post-single-author-content span {
            font-size: 9px;
        }
        .engagement-stats .stat {
            padding: 3px 7px;
            font-size: 10px;
        }
        .breaking-news-label {
            font-size: 9px;
            padding: 8px 10px;
        }
        .breaking-news-content {
            font-size: 11px;
        }
        .sidebar .widget,
        .sidebar .sidebar-widget {
            padding: 14px;
            margin-bottom: 15px;
        }
        .widget-title {
            font-size: 15px;
            margin-bottom: 12px;
        }
        .sidebar-widget.widget-recent-posts .sigma_recent-post>a img {
            width: 60px !important;
            height: 60px !important;
        }
        .sigma_recent-post-body h6 a {
            font-size: 12px;
        }
        .popular-tags-widget .tagcloud a {
            padding: 4px 8px;
            font-size: 10px;
        }
        .popular-tags-widget .tag-count {
            font-size: 9px;
        }
        .popular-tags-widget .show-all-tags,
        .popular-tags-widget .clear-filter-btn {
            padding: 4px 8px;
            font-size: 10px;
        }
        .pagination .page-item .page-link {
            padding: 6px 9px;
            font-size: 12px;
        }
    }

    /* Mobile S (≤320px) */
    @media (max-width: 320px) {
        .sigma_search-adv-input .form-control {
            height: 38px;
            font-size: 12px;
        }
        .sigma_search-adv-input button {
            width: 38px;
            height: 38px;
            font-size: 12px;
        }
        .sigma_post {
            border-radius: 10px;
        }
        .sigma_post-thumb {
            height: 140px;
        }
        .sigma_post-body {
            padding: 12px;
        }
        .sigma_post-body::before {
            left: 12px;
            right: 12px;
        }
        .sigma_post h5 a {
            font-size: 14px;
            line-height: 1.3;
        }
        .sigma_post-meta {
            gap: 6px;
            margin-bottom: 10px;
            margin-top: 8px;
        }
        .sigma_post-meta > div {
            padding: 3px 6px;
        }
        .sigma_post-meta a {
            font-size: 10px;
        }
        .news-excerpt {
            font-size: 11px;
            line-height: 1.4;
            padding-left: 8px;
            margin-bottom: 10px;
        }
        .news-category-badge {
            font-size: 8px;
            padding: 3px 7px;
        }
        .read-more-btn {
            padding: 6px 12px;
            font-size: 11px;
            border-radius: 20px;
        }
        .sigma_post-single-author {
            padding-top: 10px;
        }
        .sigma_post-single-author img {
            width: 28px;
            height: 28px;
        }
        .sigma_post-single-author-content p {
            font-size: 10px;
        }
        .sigma_post-single-author-content span {
            font-size: 8px;
            padding: 3px 7px;
        }
        .engagement-stats {
            gap: 5px;
        }
        .engagement-stats .stat {
            padding: 3px 6px;
            font-size: 9px;
        }
        .breaking-news {
            border-radius: 5px;
            margin-bottom: 15px;
        }
        .breaking-news-label {
            font-size: 8px;
            padding: 8px 8px;
            gap: 4px;
        }
        .breaking-news-content {
            font-size: 10px;
        }
        .sidebar .widget,
        .sidebar .sidebar-widget {
            padding: 12px;
            margin-bottom: 12px;
            border-radius: 6px;
        }
        .widget-title {
            font-size: 14px;
            margin-bottom: 10px;
            padding-bottom: 8px;
        }
        .sidebar-widget.widget-recent-posts .sigma_recent-post>a img {
            width: 55px !important;
            height: 55px !important;
        }
        .sigma_recent-post-body h6 a {
            font-size: 11px;
            word-break: break-word;
            overflow-wrap: break-word;
        }
        .popular-tags-widget .tagcloud {
            gap: 5px;
        }
        .popular-tags-widget .tagcloud a {
            padding: 3px 7px;
            font-size: 10px;
            word-break: break-word;
        }
        .popular-tags-widget .tag-count {
            font-size: 8px;
            padding: 1px 5px;
        }
        .popular-tags-widget .show-all-tags,
        .popular-tags-widget .clear-filter-btn {
            padding: 3px 7px;
            font-size: 10px;
        }
        .pagination {
            margin-top: 20px;
        }
        .pagination .page-item .page-link {
            padding: 5px 8px;
            font-size: 11px;
        }
        .read-time {
            padding: 4px 7px;
            font-size: 10px;
        }
        .news-filters {
            padding: 12px;
            gap: 8px;
        }
        .filter-btn {
            padding: 5px 10px;
            font-size: 11px;
        }
        .filter-label {
            font-size: 12px;
        }
    }
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('subheader'); ?>
<div class="sigma_subheader">
    <div class="overlay">
        <div class="sub-head-banner"></div>
        <h4 class="header-img-text">News</h4>
    </div>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-normal">
            <li class="breadcrumb-item"><a class="btn-link" href="<?php echo e(url('/')); ?>">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">News</li>
        </ol>
    </nav>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="section">
    <div class="container">
        <!-- Breaking News Ticker -->
        <?php if($newsList->isNotEmpty()): ?>
        <div class="breaking-news">
            <span class="breaking-news-label">
                <i class="fas fa-bolt"></i> Breaking News
            </span>
            <div class="breaking-news-ticker">
                <div class="breaking-news-content">
                    <?php $__currentLoopData = $newsList->take(5); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $breakingNews): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php echo e($breakingNews->title); ?><?php if(!$loop->last): ?> &nbsp;&nbsp;&nbsp;•&nbsp;&nbsp;&nbsp; <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
        <?php endif; ?>

        <div class="row">

            <!-- Sidebar Start -->
            <div class="col-lg-4">
                <div class="sidebar">

                    <!-- Search Widget -->
                    <div class="sidebar-widget widget-search">
                        <h5 class="widget-title">Search</h5>
                        <form method="GET" action="<?php echo e(route('frontend.news')); ?>" id="news-search-form">
                            <div class="sigma_search-adv-input">
                                <input type="text" class="form-control" id="news-search-input" placeholder="Search News..." name="search" value="<?php echo e(request('search')); ?>" autocomplete="off">
                                <button type="submit"><i class="fa fa-search"></i></button>
                            </div>
                        </form>
                    </div>

                    <!-- Recent Posts Widget -->
                    <div class="sidebar-widget widget-recent-posts">
                        <h5 class="widget-title">Recent News</h5>
                        <?php $__currentLoopData = $recentNews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $recent): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <article class="sigma_recent-post">
                            <a href="<?php echo e(route('frontend.news.details', $recent->id)); ?>">
                                <?php if($recent->attachments && count($recent->attachments) > 0): ?>
                                    <img src="<?php echo e(asset($recent->attachments[0])); ?>" alt="<?php echo e($recent->title); ?>">
                                <?php else: ?>
                                    <img src="https://via.placeholder.com/85x85/7E4555/ffffff?text=News" alt="<?php echo e($recent->title); ?>">
                                <?php endif; ?>
                            </a>
                            <div class="sigma_recent-post-body">
                                <h6><a href="<?php echo e(route('frontend.news.details', $recent->id)); ?>"><?php echo e(Str::limit($recent->title, 50)); ?></a></h6>
                                <a href="<?php echo e(route('frontend.news.details', $recent->id)); ?>"><i class="far fa-calendar"></i> <?php echo e($recent->date_time->format('M d, Y')); ?></a>
                            </div>
                        </article>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>

                    <!-- Popular Tags Widget -->
                    <div class="sidebar-widget popular-tags-widget">
                        <h5 class="widget-title">Popular Tags</h5>
                        <div class="tagcloud">
                            <?php if($popularLocations && $popularLocations->count() > 0): ?>
                                <?php
                                    // Additional deduplication: normalize and filter unique locations
                                    $displayedLocations = [];
                                    $uniqueLocations = collect();

                                    foreach($popularLocations as $location) {
                                        if ($location->location) {
                                            $normalizedLocation = trim($location->location);

                                            // Check if this normalized location hasn't been displayed yet
                                            if (!in_array($normalizedLocation, $displayedLocations)) {
                                                $displayedLocations[] = $normalizedLocation;
                                                $uniqueLocations->push($location);
                                            }
                                        }
                                    }
                                ?>

                                <?php $__currentLoopData = $uniqueLocations->take(10); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $location): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php
                                        $trimmedLocation = trim($location->location);
                                        $encodedLocation = urlencode($trimmedLocation);
                                        $requestLocation = request('location') ? urldecode(request('location')) : '';
                                    ?>
                                    <a href="#" class="location-tag <?php echo e($requestLocation == $trimmedLocation ? 'active' : ''); ?>" data-location="<?php echo e($trimmedLocation); ?>">
                                        <i class="fas fa-map-marker-alt"></i>
                                        <?php echo e($trimmedLocation); ?>

                                        <span class="tag-count"><?php echo e($location->total); ?></span>
                                    </a>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                <a href="#" class="clear-filter-btn <?php echo e(request('location') ? 'show' : ''); ?>" id="clearFilter">
                                    <i class="fas fa-times-circle"></i>
                                    Clear Filter
                                </a>

                                <?php if($uniqueLocations->count() > 10): ?>
                                    <a href="#" class="show-all-tags" id="showAllTags">
                                        <i class="fas fa-tags"></i>
                                        Show All (<?php echo e($uniqueLocations->count()); ?>)
                                    </a>
                                <?php endif; ?>
                            <?php else: ?>
                                <p style="color: #999; font-size: 14px;">No locations available</p>
                            <?php endif; ?>
                        </div>
                    </div>

                </div>
            </div>
            <!-- Sidebar End -->

            <!-- News Grid Start -->
            <div class="col-lg-8">
                <div class="row">
                    <?php $__empty_1 = true; $__currentLoopData = $newsList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $news): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="col-md-6 mb-4">
                        <article class="sigma_post">
                            <div class="sigma_post-thumb">
                                <?php if($news->attachments && count($news->attachments) > 0): ?>
                                    <a href="<?php echo e(route('frontend.news.details', $news->id)); ?>">
                                        <img src="<?php echo e(asset($news->attachments[0])); ?>" alt="<?php echo e($news->title); ?>">
                                    </a>
                                <?php else: ?>
                                    <a href="<?php echo e(route('frontend.news.details', $news->id)); ?>">
                                        <img src="https://via.placeholder.com/400x280/7E4555/ffffff?text=News+Image" alt="<?php echo e($news->title); ?>">
                                    </a>
                                <?php endif; ?>

                                <!-- Category Badge -->
                                <?php if($news->location): ?>
                                <span class="news-category-badge">
                                    <i class="fas fa-map-marker-alt"></i> <?php echo e($news->location); ?>

                                </span>
                                <?php endif; ?>

                                <!-- Read More Button -->
                                <a href="<?php echo e(route('frontend.news.details', $news->id)); ?>" class="read-more-overlay">
                                    Read Full News <i class="fas fa-arrow-right"></i>
                                </a>
                            </div>
                            <div class="sigma_post-body">
                                <div class="sigma_post-meta">
                                    <div>
                                        <i class="far fa-calendar"></i>
                                        <a href="<?php echo e(route('frontend.news.details', $news->id)); ?>" class="sigma_post-date"><?php echo e($news->date_time->format('M d, Y')); ?></a>
                                    </div>
                                </div>
                                <h5>
                                    <a href="<?php echo e(route('frontend.news.details', $news->id)); ?>"><?php echo e($news->title); ?></a>
                                </h5>
                                <p class="news-excerpt"><?php echo e(Str::limit(strip_tags($news->final_news ?? $news->short_news), 120)); ?></p>
                                <div class="sigma_post-single-author">
                                    <a href="<?php echo e(route('frontend.news.details', $news->id)); ?>" class="read-more-btn">
                                        Read More <i class="fas fa-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                        </article>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <div class="col-12">
                        <div class="alert alert-info" style="text-align: center; padding: 40px; border-radius: 8px;">
                            <i class="fas fa-info-circle" style="font-size: 48px; color: #17a2b8; margin-bottom: 15px;"></i>
                            <h4>No News Available</h4>
                            <p class="mb-0">There are no news articles at the moment. Please check back later.</p>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>

                <!-- Pagination -->
                <?php if($newsList->hasPages()): ?>
                <div class="row">
                    <div class="col-12">
                        <ul class="pagination">
                            
                            <?php if($newsList->onFirstPage()): ?>
                                <li class="page-item disabled"><span class="page-link">‹</span></li>
                            <?php else: ?>
                                <li class="page-item"><a class="page-link" href="<?php echo e($newsList->previousPageUrl()); ?>" rel="prev">‹</a></li>
                            <?php endif; ?>

                            
                            <?php $__currentLoopData = $newsList->links()->elements[0]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page => $url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($page == $newsList->currentPage()): ?>
                                    <li class="page-item active"><span class="page-link"><?php echo e($page); ?></span></li>
                                <?php else: ?>
                                    <li class="page-item"><a class="page-link" href="<?php echo e($url); ?>"><?php echo e($page); ?></a></li>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            
                            <?php if($newsList->hasMorePages()): ?>
                                <li class="page-item"><a class="page-link" href="<?php echo e($newsList->nextPageUrl()); ?>" rel="next">›</a></li>
                            <?php else: ?>
                                <li class="page-item disabled"><span class="page-link">›</span></li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
                <?php endif; ?>
            </div>
            <!-- News Grid End -->

        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
// News Search with Autocomplete
$(document).ready(function() {
    let searchTimer;
    let $searchInput = $('#news-search-input');
    let $searchForm = $('#news-search-form');
    const newsGrid = document.querySelector('.col-lg-8 .row');
    const breakingNewsSection = document.querySelector('.breaking-news');

    // Create autocomplete dropdown
    let $autocompleteList = $('<ul class="news-autocomplete-list"></ul>');
    $searchInput.after($autocompleteList);

    // Hide autocomplete on click outside
    $(document).on('click', function(e) {
        if (!$(e.target).closest('.sidebar-widget.widget-search').length) {
            $autocompleteList.hide();
        }
    });

    // Search on input - show autocomplete
    $searchInput.on('input', function() {
        let query = $(this).val().trim();

        clearTimeout(searchTimer);

        if (query.length < 2) {
            $autocompleteList.hide();

            // If search is cleared completely, reload all news
            if (query.length === 0) {
                performSearch('');
            }
            return;
        }

        searchTimer = setTimeout(function() {
            $.ajax({
                url: '<?php echo e(route('api.news.search')); ?>',
                method: 'GET',
                data: { query: query },
                success: function(data) {
                    $autocompleteList.empty();

                    if (data.length === 0) {
                        $autocompleteList.html('<li class="no-results"><i class="fas fa-info-circle"></i>No news found</li>').show();
                        return;
                    }

                    data.forEach(function(news) {
                        let $item = $('<li class="autocomplete-item"></li>');
                        $item.html(
                            '<div class="news-title">' + news.label + '</div>' +
                            '<div class="news-meta">' +
                                '<span><i class="fas fa-map-marker-alt"></i>' + news.location + '</span>' +
                                '<span><i class="far fa-calendar"></i>' + news.date + '</span>' +
                            '</div>'
                        );
                        $item.data('news', news);
                        $autocompleteList.append($item);
                    });

                    $autocompleteList.show();
                },
                error: function() {
                    console.error('Error fetching search results');
                }
            });
        }, 300); // Debounce 300ms
    });

    // Handle autocomplete item click
    $autocompleteList.on('click', '.autocomplete-item', function() {
        let news = $(this).data('news');
        $searchInput.val(news.value);
        $autocompleteList.hide();

        // Trigger search to display results
        performSearch(news.value);
    });

    // Handle form submit
    $searchForm.on('submit', function(e) {
        e.preventDefault();
        let query = $searchInput.val().trim();
        $autocompleteList.hide();
        performSearch(query);
    });

    // Handle keyboard navigation
    $searchInput.on('keydown', function(e) {
        let $items = $autocompleteList.find('.autocomplete-item');
        let $active = $items.filter('.active');

        if (e.key === 'ArrowDown') {
            e.preventDefault();
            if ($active.length === 0) {
                $items.first().addClass('active');
            } else {
                $active.removeClass('active').next('.autocomplete-item').addClass('active');
            }
        } else if (e.key === 'ArrowUp') {
            e.preventDefault();
            if ($active.length > 0) {
                $active.removeClass('active').prev('.autocomplete-item').addClass('active');
            }
        } else if (e.key === 'Enter') {
            if ($active.length > 0) {
                e.preventDefault();
                $active.click();
            }
        } else if (e.key === 'Escape') {
            $autocompleteList.hide();
        }
    });

    // Perform Search Function
    function performSearch(query, location = '') {
        const url = new URL('<?php echo e(route("frontend.news")); ?>');
        if (query) {
            url.searchParams.set('search', query);
        }
        if (location) {
            // Properly encode Bangla/Unicode characters
            url.searchParams.set('location', encodeURIComponent(location));
        }

        fetch(url, {
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
        .then(response => response.text())
        .then(html => {
            const parser = new DOMParser();
            const doc = parser.parseFromString(html, 'text/html');

            // Update news grid
            const newGrid = doc.querySelector('.col-lg-8 .row');
            if (newGrid && newsGrid) {
                newsGrid.innerHTML = newGrid.innerHTML;
            }

            // Update breaking news
            const newBreaking = doc.querySelector('.breaking-news');
            if (newBreaking && breakingNewsSection) {
                breakingNewsSection.innerHTML = newBreaking.innerHTML;
            }

            // Update URL without page reload
            window.history.pushState({}, '', url);
        })
        .catch(error => {
            console.error('Search error:', error);
        });
    }

    // Check if mobile/tablet
    function isMobileOrTablet() {
        return window.innerWidth <= 1024;
    }

    // Handle Location Tag Clicks
    $(document).on('click', '.location-tag', function(e) {
        e.preventDefault();
        const location = $(this).data('location');
        const scrollPos = $(window).scrollTop();

        // Toggle active state
        if ($(this).hasClass('active')) {
            $(this).removeClass('active');
            $('#clearFilter').removeClass('show');
            performSearch('', '');
        } else {
            $('.location-tag').removeClass('active');
            $(this).addClass('active');
            $('#clearFilter').addClass('show');
            $searchInput.val('');
            performSearch('', location);
        }

        // Prevent auto-scroll on mobile/tablet
        if (isMobileOrTablet()) {
            requestAnimationFrame(function() {
                $(window).scrollTop(scrollPos);
            });
        }
    });

    // Handle Clear Filter Button
    $(document).on('click', '#clearFilter', function(e) {
        e.preventDefault();
        $('.location-tag').removeClass('active');
        $(this).removeClass('show');
        $searchInput.val('');
        performSearch('', '');
    });

    // Handle Show All Tags
    $(document).on('click', '#showAllTags', function(e) {
        e.preventDefault();
        // You can implement a modal or expand functionality here
        alert('Show all tags functionality - to be implemented');
    });
});
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.default', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragonUpdated\www\rr-app\resources\views/frontend/pages/news/news.blade.php ENDPATH**/ ?>