@extends('frontend.layouts.default')

@section('title', $news->title . ' - Bengali Hindu Unity')

@section('stylesheet')
<link rel="stylesheet" href="{{ asset('frontend/assets/css/gallery-slider.css') }}">
<style>
    /* Reading Progress Bar */
    .reading-progress-bar {
        position: fixed;
        top: 0;
        left: 0;
        width: 0;
        height: 4px;
        background: linear-gradient(90deg, #f60 0%, #e55 100%);
        z-index: 9999;
        transition: width 0.1s ease;
    }

    /* Article Header */
    .article-header {
        background: linear-gradient(to right, #dc8a45, #5c5555);
        padding: 40px;
        border-radius: 15px;
        margin-bottom: 30px;
        box-shadow: 0 10px 40px rgba(216, 104, 0, 0.3);
        position: relative;
        overflow: hidden;
    }

    .article-header::before {
        content: '';
        position: absolute;
        top: -50%;
        right: -10%;
        width: 300px;
        height: 300px;
        background: rgba(255,255,255,0.05);
        border-radius: 50%;
    }

    .article-category {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 8px 20px;
        background: rgba(255,255,255,0.15);
        color: #fff;
        border-radius: 25px;
        font-size: 13px;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        margin-bottom: 20px;
        backdrop-filter: blur(10px);
    }

    .article-title {
        font-size: 38px;
        font-weight: 800;
        color: #fff;
        margin-bottom: 20px;
        line-height: 1.3;
        text-shadow: 2px 2px 4px rgba(0,0,0,0.2);
        padding: 20px 30px;
        border-radius: 12px;
        display: inline-block;
        box-shadow: 0 5px 20px rgba(216, 104, 0, 0.4);
    }

    .article-meta {
        display: flex;
        gap: 25px;
        flex-wrap: wrap;
        color: rgba(255,255,255,0.9);
    }

    .article-meta-item {
        display: flex;
        align-items: center;
        gap: 8px;
        background: rgba(255,255,255,0.1);
        padding: 8px 15px;
        border-radius: 20px;
        font-size: 14px;
        font-weight: 500;
        backdrop-filter: blur(10px);
    }

    .article-meta-item i {
        color: rgb(79, 55, 39);
        font-size: 15px;
    }

    /* Article Content */
    .sigma_post-details {
        background: #fff;
        border-radius: 15px;
        padding: 0;
        box-shadow: 0 5px 25px rgba(0,0,0,0.1);
        border: 1px solid rgba(0,0,0,0.05);
    }

    .article-content {
        padding: 40px;
    }

    .entry-thumbnail {
        margin-bottom: 0;
        border-radius: 0;
        overflow: hidden;
        position: relative;
        height: 500px;
    }

    .entry-thumbnail img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .entry-thumbnail::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        height: 100px;
        background: linear-gradient(to top, rgba(0,0,0,0.5) 0%, transparent 100%);
    }

    .entry-body {
        font-size: 17px;
        line-height: 1.9;
        color: #444;
        padding: 30px 0;
    }

    .entry-body h5 {
        font-size: 26px;
        font-weight: 700;
        color: #1a1a1a;
        margin-bottom: 20px;
        margin-top: 35px;
        position: relative;
        padding-left: 20px;
    }

    .entry-body h5::before {
        content: '';
        position: absolute;
        left: 0;
        top: 50%;
        transform: translateY(-50%);
        width: 5px;
        height: 30px;
        background: linear-gradient(135deg, #f60 0%, #e55 100%);
        border-radius: 3px;
    }

    .entry-body strong {
        color: #1a1a1a;
        font-weight: 700;
        background: linear-gradient(to right, rgba(255, 102, 0, 0.1), transparent);
        padding: 2px 8px;
        border-radius: 3px;
    }

    .entry-body p {
        margin-bottom: 20px;
        text-align: justify;
    }

    .entry-gallery h5 {
        font-size: 24px;
        font-weight: 700;
        margin-bottom: 25px;
        color: #1a1a1a;
    }

    .gallery-thumb {
        display: block;
        border-radius: 12px;
        overflow: hidden;
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        box-shadow: 0 3px 15px rgba(0,0,0,0.1);
        position: relative;
    }

    .gallery-thumb::after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(0,0,0,0.5);
        opacity: 0;
        transition: opacity 0.3s;
    }

    .gallery-thumb:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 30px rgba(0,0,0,0.2);
    }

    .gallery-thumb:hover::after {
        opacity: 1;
    }

    .gallery-thumb img {
        width: 100%;
        height: 220px;
        object-fit: cover;
        transition: transform 0.4s;
    }

    .gallery-thumb:hover img {
        transform: scale(1.1);
    }

    /* Enhanced Author Card */
    .author-card {
        background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        border-radius: 15px;
        padding: 35px;
        margin-top: 40px;
        box-shadow: 0 5px 20px rgba(0,0,0,0.08);
        border: 1px solid #dee2e6;
        display: flex;
        align-items: center;
        gap: 25px;
    }

    .author-card img {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        object-fit: cover;
        border: 5px solid #fff;
        box-shadow: 0 5px 20px rgba(0,0,0,0.15);
    }

    .author-info h6 {
        font-size: 12px;
        color: #6c757d;
        margin-bottom: 10px;
        text-transform: uppercase;
        letter-spacing: 1px;
        font-weight: 600;
    }

    .author-info .author-name {
        font-size: 26px;
        font-weight: 700;
        color: #1a1a1a;
        margin-bottom: 12px;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .author-info .author-name::before {
        content: '✍️';
        font-size: 20px;
    }

    .author-info .author-time {
        color: #fff;
        font-size: 13px;
        font-weight: 600;
        display: inline-flex;
        align-items: center;
        gap: 6px;
        background: linear-gradient(135deg, #f60 0%, #e55 100%);
        padding: 8px 16px;
        border-radius: 25px;
        box-shadow: 0 3px 10px rgba(255, 102, 0, 0.3);
        transition: all 0.3s;
    }

    .author-info .author-time::before {
        content: '🕐';
        font-size: 14px;
    }

    .author-card:hover .author-info .author-time {
        transform: translateX(5px);
        box-shadow: 0 5px 15px rgba(255, 102, 0, 0.4);
    }

    .sigma_post-share {
        background: #fff;
        padding: 35px;
        border-radius: 15px;
        box-shadow: 0 5px 20px rgba(0,0,0,0.08);
        margin-top: 30px;
        border: 1px solid rgba(0,0,0,0.05);
    }

    .sigma_post-share h5 {
        font-size: 22px;
        font-weight: 700;
        margin-bottom: 20px;
        color: #1a1a1a;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .sigma_post-share h5 i {
        color: #f60;
    }

    .sigma_sm.square {
        display: flex;
        gap: 12px;
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .sigma_sm.square li a {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 55px;
        height: 55px;
        background: #f8f9fa;
        color: #6c757d;
        border-radius: 12px;
        transition: all 0.3s;
        font-size: 20px;
        border: 2px solid #e9ecef;
    }

    .sigma_sm.square li a:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 20px rgba(0,0,0,0.15);
    }

    .sigma_sm.square li:nth-child(1) a:hover {
        background: #3b5998;
        color: #fff;
        border-color: #3b5998;
    }

    .sigma_sm.square li:nth-child(2) a:hover {
        background: #1da1f2;
        color: #fff;
        border-color: #1da1f2;
    }

    .sigma_sm.square li:nth-child(3) a:hover {
        background: #25d366;
        color: #fff;
        border-color: #25d366;
    }

    .sigma_sm.square li:nth-child(4) a:hover {
        background: #0088cc;
        color: #fff;
        border-color: #0088cc;
    }

    .sigma_sm.square li:nth-child(5) a:hover {
        background: #0077b5;
        color: #fff;
        border-color: #0077b5;
    }

    /* Related News Section */
    .related-news {
        background: #fff;
        padding: 35px;
        border-radius: 15px;
        box-shadow: 0 5px 20px rgba(0,0,0,0.08);
        margin-top: 30px;
        border: 1px solid rgba(0,0,0,0.05);
    }

    .related-news h5 {
        font-size: 24px;
        font-weight: 700;
        margin-bottom: 25px;
        color: #1a1a1a;
        padding-bottom: 15px;
        border-bottom: 3px solid #f60;
        position: relative;
    }

    .related-news h5::after {
        content: '';
        position: absolute;
        bottom: -3px;
        left: 0;
        width: 60px;
        height: 3px;
        background: #7E4555;
    }

    .related-news-item {
        display: flex;
        gap: 20px;
        padding: 20px;
        background: #f8f9fa;
        border-radius: 12px;
        transition: all 0.3s;
        margin-bottom: 15px;
        border: 1px solid #e9ecef;
    }

    .related-news-item:hover {
        background: #fff;
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        transform: translateX(5px);
    }

    .related-news-thumb {
        width: 120px;
        height: 90px;
        border-radius: 10px;
        overflow: hidden;
        flex-shrink: 0;
    }

    .related-news-thumb img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.3s;
    }

    .related-news-item:hover .related-news-thumb img {
        transform: scale(1.1);
    }

    .related-news-content h6 {
        font-size: 16px;
        font-weight: 600;
        color: #333;
        margin-bottom: 8px;
        line-height: 1.4;
    }

    .related-news-content h6 a {
        color: #333;
        transition: color 0.3s;
    }

    .related-news-content h6 a:hover {
        color: #f60;
    }

    .related-news-meta {
        display: flex;
        gap: 15px;
        font-size: 13px;
        color: #6c757d;
    }

    .related-news-meta span {
        display: flex;
        align-items: center;
        gap: 5px;
    }

    .related-news-meta i {
        color: #f60;
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
        background-color: #f60 !important;
        color: #fff !important;
    }

    .sidebar .sidebar-widget.widget-search .sigma_search-adv-input button:hover {
        background-color: #e55 !important;
    }

    /* Popular Tags Styles */
    .widget-tags .tagcloud {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
    }

    .widget-tags .tagcloud a {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 10px 18px;
        background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        color: #555;
        border: 2px solid #e9ecef;
        border-radius: 25px;
        font-size: 13px;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }

    .widget-tags .tagcloud a::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
        transition: left 0.5s ease;
    }

    .widget-tags .tagcloud a:hover::before {
        left: 100%;
    }

    .widget-tags .tagcloud a:hover {
        background: linear-gradient(135deg, #d86800 0%, #b85700 100%);
        color: #fff !important;
        border-color: #d86800 !important;
        transform: translateY(-3px);
        box-shadow: 0 6px 20px rgba(216, 104, 0, 0.4);
    }

    /* Responsive */
    @media (max-width: 768px) {
        .article-title { font-size: 28px; }
        .article-header { padding: 25px; }
        .entry-thumbnail { height: 300px; }
        .article-content { padding: 25px; }
        .entry-body { font-size: 16px; }
        .author-card { flex-direction: column; text-align: center; }
        .article-stats { flex-wrap: wrap; gap: 15px; }
        .stat-box:not(:last-child)::after { display: none; }
        .related-news-item { flex-direction: column; }
        .related-news-thumb { width: 100%; height: 200px; }
    }

    /* ===== News Details — Mobile/Tablet Responsive ===== */

    /* Tablet Landscape (≤1024px) — reorder + layout */
    @media (max-width: 1024px) {
        /* Article header (date/time/location) */
        .article-header {
            padding: 30px;
            margin-bottom: 20px;
        }
        .article-title {
            font-size: 30px;
            padding: 15px 20px;
        }
        .article-meta {
            gap: 15px;
        }

        /* Reorder: content first, sidebar second */
        .section > .container > .row {
            display: flex;
            flex-direction: column;
        }
        .section > .container > .row > .col-lg-8 {
            order: 1;
            width: 100%;
            max-width: 100%;
            flex: 0 0 100%;
        }
        .section > .container > .row > .col-lg-4 {
            order: 2;
            width: 100%;
            max-width: 100%;
            flex: 0 0 100%;
            margin-top: 30px;
        }

        /* Sidebar widgets order */
        .section > .container > .row > .col-lg-4 > .sidebar {
            display: flex;
            flex-direction: column;
        }
        .section > .container > .row > .col-lg-4 > .sidebar > .sidebar-widget.widget-recent-posts {
            order: 1;
        }
        .section > .container > .row > .col-lg-4 > .sidebar > .sidebar-widget.widget-tags {
            order: 2;
        }

        /* Featured image responsive */
        .entry-thumbnail {
            height: 380px;
        }
        .entry-thumbnail img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        /* Content readability */
        .article-content {
            padding: 30px;
        }
        .entry-body {
            font-size: 16px;
            line-height: 1.85;
        }
        .entry-body h5 {
            font-size: 22px;
        }

        /* Recent news cards */
        .sidebar-widget.widget-recent-posts .sigma_recent-post > a img {
            width: 75px !important;
            height: 75px !important;
        }

        /* Popular tags wrap */
        .widget-tags .tagcloud {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
        }
        .widget-tags .tagcloud a {
            font-size: 12px;
            padding: 8px 14px;
        }

        /* Share buttons */
        .sigma_post-share {
            padding: 25px;
        }
        .sigma_sm.square li a {
            width: 45px;
            height: 45px;
            font-size: 18px;
        }

        /* Gallery */
        .gallery-thumb img {
            height: 180px;
        }
    }

    /* Tablet Portrait (≤768px) */
    @media (max-width: 768px) {
        .article-header {
            padding: 22px;
            margin-bottom: 18px;
            border-radius: 10px;
        }
        .article-title {
            font-size: 24px;
            padding: 12px 16px;
        }
        .article-category {
            font-size: 12px;
            padding: 6px 14px;
            margin-bottom: 14px;
        }
        .article-meta {
            gap: 10px;
        }
        .article-meta-item {
            font-size: 13px;
            padding: 6px 12px;
            gap: 6px;
        }
        .article-meta-item i {
            font-size: 13px;
        }

        .entry-thumbnail {
            height: 280px;
        }

        .article-content {
            padding: 22px;
        }
        .entry-body {
            font-size: 15px;
            line-height: 1.8;
            padding: 20px 0;
        }
        .entry-body h5 {
            font-size: 20px;
            margin-top: 25px;
            margin-bottom: 15px;
            padding-left: 16px;
        }
        .entry-body h5::before {
            width: 4px;
            height: 24px;
        }

        /* Related news responsive */
        .related-news {
            padding: 22px;
        }
        .related-news h5 {
            font-size: 20px;
            margin-bottom: 18px;
        }
        .related-news-item {
            padding: 15px;
            gap: 15px;
        }

        /* Recent news */
        .sidebar-widget.widget-recent-posts .sigma_recent-post > a img {
            width: 65px !important;
            height: 65px !important;
        }
        .widget-recent-posts .sigma_recent-post > a {
            width: 65px;
            margin-right: 12px;
        }
        .widget-recent-posts .sigma_recent-post h6 {
            font-size: 14px;
        }

        /* Social share */
        .sigma_post-share {
            padding: 20px;
        }
        .sigma_sm.square {
            gap: 8px;
            flex-wrap: wrap;
        }
        .sigma_sm.square li a {
            width: 42px;
            height: 42px;
            font-size: 16px;
        }

        /* Gallery */
        .entry-gallery .col-md-4 {
            flex: 0 0 50%;
            max-width: 50%;
        }
        .gallery-thumb img {
            height: 160px;
        }
    }

    /* Mobile L (≤425px) */
    @media (max-width: 425px) {
        .article-header {
            padding: 18px;
            margin-bottom: 15px;
            border-radius: 8px;
        }
        .article-header::before {
            width: 200px;
            height: 200px;
        }
        .article-title {
            font-size: 20px;
            padding: 10px 14px;
            line-height: 1.35;
        }
        .article-category {
            font-size: 11px;
            padding: 5px 12px;
            margin-bottom: 12px;
        }
        .article-meta {
            flex-direction: column;
            gap: 8px;
        }
        .article-meta-item {
            font-size: 12px;
            padding: 6px 10px;
        }

        .entry-thumbnail {
            height: auto;
        }
        .entry-thumbnail img {
            height: auto;
        }

        .article-content {
            padding: 16px;
        }
        .entry-body {
            font-size: 14px;
            line-height: 1.75;
            padding: 15px 0;
        }
        .entry-body h5 {
            font-size: 18px;
            margin-top: 22px;
            margin-bottom: 12px;
            padding-left: 14px;
        }
        .entry-body p {
            margin-bottom: 14px;
        }

        /* Related news stack */
        .related-news {
            padding: 16px;
        }
        .related-news h5 {
            font-size: 18px;
        }
        .related-news-item {
            flex-direction: column;
            padding: 12px;
            gap: 12px;
        }
        .related-news-thumb {
            width: 100%;
            height: 180px;
        }
        .related-news-content h6 {
            font-size: 14px;
        }
        .related-news-meta {
            font-size: 12px;
            gap: 10px;
        }

        /* Recent news */
        .sidebar-widget.widget-recent-posts .sigma_recent-post > a img {
            width: 60px !important;
            height: 60px !important;
        }
        .widget-recent-posts .sigma_recent-post > a {
            width: 60px;
            margin-right: 10px;
        }
        .widget-recent-posts .sigma_recent-post h6 {
            font-size: 13px;
        }

        /* Tags */
        .widget-tags .tagcloud a {
            font-size: 11px;
            padding: 6px 12px;
        }

        /* Sidebar widget padding */
        .sidebar .widget,
        .sidebar .sidebar-widget {
            padding: 20px;
        }

        /* Share */
        .sigma_post-share {
            padding: 16px;
        }
        .sigma_post-share h5 {
            font-size: 18px;
        }
        .sigma_sm.square li a {
            width: 40px;
            height: 40px;
            font-size: 16px;
            border-radius: 10px;
        }

        /* Author */
        .author-card {
            padding: 20px;
        }
        .author-card img {
            width: 80px;
            height: 80px;
        }
        .author-info .author-name {
            font-size: 20px;
        }

        /* Gallery */
        .entry-gallery .col-md-4 {
            flex: 0 0 50%;
            max-width: 50%;
        }
        .gallery-thumb img {
            height: 140px;
        }
    }

    /* Mobile M (≤375px) */
    @media (max-width: 375px) {
        .article-header {
            padding: 14px;
        }
        .article-title {
            font-size: 18px;
            padding: 8px 12px;
        }
        .article-category {
            font-size: 10px;
            padding: 4px 10px;
        }
        .article-meta-item {
            font-size: 11px;
            padding: 5px 8px;
        }

        .article-content {
            padding: 14px;
        }
        .entry-body {
            font-size: 13.5px;
            line-height: 1.7;
        }
        .entry-body h5 {
            font-size: 16px;
        }

        .related-news {
            padding: 14px;
        }
        .related-news-thumb {
            height: 160px;
        }
        .related-news-content h6 {
            font-size: 13px;
        }

        .sidebar .widget,
        .sidebar .sidebar-widget {
            padding: 16px;
        }
        .widget-title {
            font-size: 18px;
            margin-bottom: 18px;
            padding-bottom: 12px;
        }

        .widget-tags .tagcloud a {
            font-size: 10px;
            padding: 5px 10px;
        }

        .author-card {
            padding: 16px;
        }
        .author-card img {
            width: 70px;
            height: 70px;
        }
        .author-info .author-name {
            font-size: 18px;
        }
        .author-info .author-time {
            font-size: 11px;
            padding: 6px 12px;
        }

        .gallery-thumb img {
            height: 120px;
        }
    }

    /* Mobile S (≤320px) */
    @media (max-width: 320px) {
        .article-header {
            padding: 12px;
        }
        .article-title {
            font-size: 16px;
            padding: 6px 10px;
        }
        .article-category {
            font-size: 9px;
        }
        .article-meta-item {
            font-size: 10px;
        }

        .article-content {
            padding: 12px;
        }
        .entry-body {
            font-size: 13px;
            line-height: 1.65;
        }
        .entry-body h5 {
            font-size: 15px;
        }

        .related-news {
            padding: 12px;
        }
        .related-news-thumb {
            height: 140px;
        }
        .related-news-content h6 {
            font-size: 12px;
        }

        .sidebar .widget,
        .sidebar .sidebar-widget {
            padding: 14px;
        }
        .widget-title {
            font-size: 16px;
            margin-bottom: 15px;
        }

        .sigma_post-share {
            padding: 12px;
        }
        .sigma_sm.square li a {
            width: 36px;
            height: 36px;
            font-size: 14px;
            border-radius: 8px;
        }

        .entry-gallery .col-md-4 {
            flex: 0 0 100%;
            max-width: 100%;
        }
        .gallery-thumb img {
            height: 180px;
        }
    }
</style>
@endsection

@section('subheader')
<div class="sigma_subheader">
    <div class="overlay">
        <div class="sub-head-banner"></div>
        <h4 class="header-img-text">{{ Str::limit($news->title, 50) }}</h4>
    </div>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-details">
            <li class="breadcrumb-item"><a class="btn-link" href="{{ url('/') }}">Home</a></li>
            <li class="breadcrumb-item"><a class="btn-link" href="{{ route('frontend.news') }}">News</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ Str::limit($news->title, 30) }}</li>
        </ol>
    </nav>
</div>
@endsection

@section('content')
<!-- Reading Progress Bar -->
<div class="reading-progress-bar" id="progressBar"></div>

<div class="section">
    <div class="container">
        <!-- Article Header -->
        <div class="article-header">
            <span class="article-category">
                <i class="fas fa-map-marker-alt"></i> {{ $news->location ?? 'News' }}
            </span>
            <h1 class="article-title">{{ $news->title }}</h1>
            <div class="article-meta">
                <div class="article-meta-item">
                    <i class="far fa-calendar"></i>
                    <span>{{ $news->date_time->format('F d, Y') }}</span>
                </div>
                <div class="article-meta-item">
                    <i class="far fa-clock"></i>
                    <span>{{ $news->date_time->format('h:i A') }}</span>
                </div>
            </div>
        </div>

        <div class="row">

            <!-- Sidebar Start -->
            <div class="col-lg-4">
                <div class="sidebar">

                    {{-- Search Widget removed from News Details --}}
                    {{--
                    <div class="sidebar-widget widget-search">
                        <h5 class="widget-title">Search</h5>
                        <form method="GET" action="{{ route('frontend.news') }}">
                            <div class="sigma_search-adv-input">
                                <input type="text" class="form-control" placeholder="Search News..." name="search">
                                <button type="submit"><i class="fa fa-search"></i></button>
                            </div>
                        </form>
                    </div>
                    --}}

                    <!-- Recent Posts Widget -->
                    <div class="sidebar-widget widget-recent-posts">
                        <h5 class="widget-title">Recent News</h5>
                        @foreach($recentNews as $recent)
                        <article class="sigma_recent-post">
                            <a href="{{ route('frontend.news.details', $recent->id) }}">
                                @if($recent->attachments && count($recent->attachments) > 0)
                                    <img src="{{ asset($recent->attachments[0]) }}" alt="{{ $recent->title }}">
                                @else
                                    <img src="https://via.placeholder.com/85x85/7E4555/ffffff?text=News" alt="{{ $recent->title }}">
                                @endif
                            </a>
                            <div class="sigma_recent-post-body">
                                <h6><a href="{{ route('frontend.news.details', $recent->id) }}">{{ Str::limit($recent->title, 50) }}</a></h6>
                                <a href="{{ route('frontend.news.details', $recent->id) }}"><i class="far fa-calendar"></i> {{ $recent->date_time->format('M d, Y') }}</a>
                            </div>
                        </article>
                        @endforeach
                        <a href="{{ route('frontend.news') }}" class="btn btn-block" style="background: #d86800; color: #fff; padding: 12px; text-align: center; border-radius: 5px; margin-top: 15px; display: block; text-decoration: none; font-weight: 600; transition: all 0.3s;" onmouseover="this.style.background='#b85700'" onmouseout="this.style.background='#d86800'">See All News <i class="fas fa-arrow-right"></i></a>
                    </div>

                    <!-- Popular Tags Widget -->
                    <div class="sidebar-widget widget-tags">
                        <h5 class="widget-title">Popular Tags</h5>
                        <div class="tagcloud">
                            @foreach($popularLocations as $location)
                            <a href="{{ route('frontend.news') }}?location={{ $location->location }}">{{ $location->location }}</a>
                            @endforeach
                        </div>
                    </div>

                </div>
            </div>
            <!-- Sidebar End -->

            <!-- Content Start -->
            <div class="col-lg-8">
                <div class="sigma_post-details">
                    @if($news->attachments && count($news->attachments) > 0)
                    <div class="entry-thumbnail">
                        <img src="{{ asset($news->attachments[0]) }}" alt="{{ $news->title }}">
                    </div>
                    @endif

                    <div class="article-content">
                        <div class="entry-content">

                        @if($news->final_news)
                        <div class="entry-body mt-4">
                            {!! $news->final_news !!}
                        </div>
                        @else
                        <div class="entry-body mt-4">
                            <h5>News Details</h5>

                            <div class="mb-3">
                                <strong>What Happened:</strong>
                                <p>{{ $news->what }}</p>
                            </div>

                            <div class="mb-3">
                                <strong>Who Was Involved:</strong>
                                <p>{{ $news->who }}</p>
                            </div>

                            <div class="mb-3">
                                <strong>When Did It Happen:</strong>
                                <p>{{ $news->when }}</p>
                            </div>

                            <div class="mb-3">
                                <strong>Where Did It Occur:</strong>
                                <p>{{ $news->where }}</p>
                            </div>

                            <div class="mb-3">
                                <strong>Why Did It Happen:</strong>
                                <p>{{ $news->why }}</p>
                            </div>

                            <div class="mb-3">
                                <strong>How Did It Happen:</strong>
                                <p>{{ $news->how }}</p>
                            </div>

                            @if($news->victim_testimony)
                            <div class="mb-3">
                                <strong>Victim Testimony:</strong>
                                <p>{{ $news->victim_testimony }}</p>
                            </div>
                            @endif

                            @if($news->witness_statement)
                            <div class="mb-3">
                                <strong>Witness Statement:</strong>
                                <p>{{ $news->witness_statement }}</p>
                            </div>
                            @endif
                        </div>
                        @endif

                        @if($news->attachments && count($news->attachments) > 1)
                        <div class="entry-gallery mt-4">
                            <h5>Gallery</h5>
                            @include('frontend.partials.gallery-slider', [
                                'images' => array_map(fn($a) => asset($a), array_slice($news->attachments, 1)),
                                'alt'    => $news->title . ' Gallery',
                            ])
                        </div>
                        @endif

                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>
@endsection

@section('custom_scripts')
<script>
// Reading Progress Bar
window.addEventListener('scroll', function() {
    var winScroll = document.body.scrollTop || document.documentElement.scrollTop;
    var height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
    var scrolled = (winScroll / height) * 100;
    document.getElementById('progressBar').style.width = scrolled + '%';
});
</script>
<script src="{{ asset('frontend/assets/js/gallery-slider.js') }}"></script>
@endsection
