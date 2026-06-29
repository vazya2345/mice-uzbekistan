<?php

/** @var \yii\web\View $this */

use yii\helpers\Html;

$this->title = 'MICE Uzbekistan';
?>

<!-- ============================================================
     HERO SECTION
     ============================================================ -->
<section class="mice-hero" aria-label="Hero">
    <div class="mice-hero__bg" role="img" aria-label="Convention centre panoramic photo"></div>
    <div class="mice-hero__overlay"></div>

    <div class="container mice-hero__content">
        <div class="row">
            <div class="col-lg-7 col-xl-6">
                <span class="mice-hero__eyebrow">🇺🇿 Uzbekistan's #1 MICE Platform</span>

                <h1 class="mice-hero__title">
                    Your Next Big Event<br>Starts <span>Here</span>
                </h1>

                <p class="mice-hero__subtitle">
                    Discover hundreds of premium hotels, conference rooms, and convention centres
                    across Uzbekistan — all in one place.
                </p>

                <div class="mice-hero__actions">
                    <a href="#venues" class="btn-hero-primary">
                        Explore Venues
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none"
                             viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                        </svg>
                    </a>
                    <a href="#" class="btn-hero-outline">
                        List Your Venue
                    </a>
                </div>

                <div class="mice-hero__trust">
                    <span class="trust-item"><span class="trust-dot"></span>250+ Verified venues</span>
                    <span class="trust-item"><span class="trust-dot"></span>14 Cities</span>
                    <span class="trust-item"><span class="trust-dot"></span>Free to search</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ============================================================
     SEARCH SECTION
     ============================================================ -->
<section aria-label="Venue search" class="pb-0">
    <div class="container" style="margin-top:-3.5rem; position:relative; z-index:10;">
        <div class="mice-search">
            <!-- Tabs -->
            <div class="mice-search__tabs" role="tablist">
                <button class="tab-btn active" role="tab" aria-selected="true">🏨 Hotels</button>
                <button class="tab-btn" role="tab" aria-selected="false">🎤 Conference Rooms</button>
                <button class="tab-btn" role="tab" aria-selected="false">🏛 Convention Centres</button>
                <button class="tab-btn" role="tab" aria-selected="false">🌿 Outdoor</button>
            </div>

            <!-- Fields -->
            <div class="row g-3 align-items-end">
                <div class="col-lg-3 col-md-6">
                    <label class="mice-search__label" for="search-city">City</label>
                    <select class="form-select" id="search-city" aria-label="Select city">
                        <option value="" selected>All cities</option>
                        <option>Tashkent</option>
                        <option>Samarkand</option>
                        <option>Bukhara</option>
                        <option>Namangan</option>
                        <option>Andijan</option>
                    </select>
                </div>

                <div class="col-lg-3 col-md-6">
                    <label class="mice-search__label" for="search-date">Event Date</label>
                    <input type="date" class="form-control" id="search-date">
                </div>

                <div class="col-lg-3 col-md-6">
                    <label class="mice-search__label" for="search-guests">Guests</label>
                    <select class="form-select" id="search-guests" aria-label="Number of guests">
                        <option value="">Any capacity</option>
                        <option>Up to 50</option>
                        <option>50–150</option>
                        <option>150–500</option>
                        <option>500–1 000</option>
                        <option>1 000+</option>
                    </select>
                </div>

                <div class="col-lg-3 col-md-6">
                    <label class="mice-search__label" for="search-keyword">Keyword</label>
                    <div class="d-flex gap-2">
                        <input type="text" class="form-control" id="search-keyword"
                               placeholder="e.g. projector, parking…">
                        <button class="btn-search px-3" type="button" aria-label="Search venues"
                                style="white-space:nowrap; border-radius:var(--radius-sm); background:var(--primary); color:#fff; border:none; font-weight:700; font-size:.9rem; padding:.7rem 1.2rem; display:flex; align-items:center; gap:.4rem;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none"
                                 viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                <circle cx="11" cy="11" r="8"/><path stroke-linecap="round" d="M21 21l-4.35-4.35"/>
                            </svg>
                            Search
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ============================================================
     FEATURE CARDS (Hotels / Conference Rooms / Convention Centres)
     ============================================================ -->
<section class="mice-section" id="venues" aria-labelledby="venues-title">
    <div class="container">
        <!-- Heading -->
        <div class="row mb-5">
            <div class="col-lg-6">
                <span class="section-eyebrow">What we offer</span>
                <h2 class="section-title" id="venues-title">
                    Find the Perfect Venue<br>for Every Occasion
                </h2>
            </div>
            <div class="col-lg-6 d-flex align-items-end">
                <p class="section-sub ms-lg-auto">
                    From intimate board meetings to large-scale international congresses,
                    we have a venue that fits every scale and budget.
                </p>
            </div>
        </div>

        <!-- Cards -->
        <div class="row g-4">
            <!-- Hotels -->
            <div class="col-lg-4 col-md-6">
                <article class="feature-card h-100">
                    <div class="feature-card__icon">
                        <!-- Hotel icon -->
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                             viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.7">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M3 21V8a2 2 0 012-2h14a2 2 0 012 2v13M3 21h18M9 21v-6h6v6"/>
                        </svg>
                    </div>
                    <p class="feature-card__count">120+ Venues</p>
                    <h3>Hotels</h3>
                    <p>
                        Luxury 5-star resorts and boutique hotels with dedicated event wings,
                        AV equipment, on-site catering and accommodation packages.
                    </p>
                    <ul class="list-unstyled mb-3" style="font-size:.85rem; color:var(--muted);">
                        <li>✔ Integrated accommodation</li>
                        <li>✔ Full catering & banquet service</li>
                        <li>✔ Business centre & AV support</li>
                    </ul>
                    <a href="<?= \yii\helpers\Url::to(['/hotels/hotel/index']) ?>" class="feature-card__link">
                        Browse Hotels
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="none"
                             viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4-4 4M3 12h18"/>
                        </svg>
                    </a>
                </article>
            </div>

            <!-- Conference Rooms -->
            <div class="col-lg-4 col-md-6">
                <article class="feature-card h-100">
                    <div class="feature-card__icon">
                        <!-- Presentation icon -->
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                             viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.7">
                            <rect x="2" y="3" width="20" height="14" rx="2" stroke-linecap="round"/>
                            <path stroke-linecap="round" d="M8 21h8M12 17v4"/>
                        </svg>
                    </div>
                    <p class="feature-card__count">85+ Venues</p>
                    <h3>Conference Rooms</h3>
                    <p>
                        Flexible, tech-ready conference rooms for corporate meetings, workshops,
                        training sessions and hybrid events — by the hour or full day.
                    </p>
                    <ul class="list-unstyled mb-3" style="font-size:.85rem; color:var(--muted);">
                        <li>✔ High-speed fibre internet</li>
                        <li>✔ 4K projection & video-conferencing</li>
                        <li>✔ Flexible seating arrangements</li>
                    </ul>
                    <a href="#" class="feature-card__link">
                        Browse Conference Rooms
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="none"
                             viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4-4 4M3 12h18"/>
                        </svg>
                    </a>
                </article>
            </div>

            <!-- Convention Centers -->
            <div class="col-lg-4 col-md-6">
                <article class="feature-card h-100">
                    <div class="feature-card__icon">
                        <!-- Congress icon -->
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                             viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.7">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0H5m14 0h2M5 21H3
                                     M9 7h1m-1 4h1m4-4h1m-1 4h1M9 15h6"/>
                        </svg>
                    </div>
                    <p class="feature-card__count">45+ Venues</p>
                    <h3>Convention Centers</h3>
                    <p>
                        State-of-the-art convention centres with plenary halls, exhibition floors
                        and VIP lounges — built for international congresses and trade expos.
                    </p>
                    <ul class="list-unstyled mb-3" style="font-size:.85rem; color:var(--muted);">
                        <li>✔ Capacity up to 5 000 delegates</li>
                        <li>✔ Exhibition & breakout spaces</li>
                        <li>✔ Multi-language interpretation</li>
                    </ul>
                    <a href="#" class="feature-card__link">
                        Browse Convention Centers
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="none"
                             viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4-4 4M3 12h18"/>
                        </svg>
                    </a>
                </article>
            </div>
        </div>
    </div>
</section>

<!-- ============================================================
     STATISTICS SECTION
     ============================================================ -->
<section class="mice-stats" aria-label="Platform statistics">
    <div class="container">
        <div class="row justify-content-center text-center g-0">
            <div class="col-6 col-md-3">
                <div class="stat-item">
                    <span class="stat-number">250+</span>
                    <span class="stat-label">Verified Venues</span>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="stat-item">
                    <span class="stat-number">14</span>
                    <span class="stat-label">Cities Covered</span>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="stat-item">
                    <span class="stat-number">5 000+</span>
                    <span class="stat-label">Events Hosted</span>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="stat-item">
                    <span class="stat-number">98%</span>
                    <span class="stat-label">Client Satisfaction</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ============================================================
     POPULAR CITIES SECTION
     ============================================================ -->
<section class="mice-section mice-section--alt" aria-labelledby="cities-title">
    <div class="container">
        <div class="row mb-5 align-items-end">
            <div class="col-lg-7">
                <span class="section-eyebrow">Explore by destination</span>
                <h2 class="section-title" id="cities-title">Popular MICE Cities</h2>
                <p class="section-sub">
                    Uzbekistan's rich history and modern infrastructure make every city
                    a memorable backdrop for your event.
                </p>
            </div>
            <div class="col-lg-5 text-lg-end mt-3 mt-lg-0">
                <a href="#" style="font-size:.9rem; font-weight:700; color:var(--primary); text-decoration:none;">
                    View all 14 cities →
                </a>
            </div>
        </div>

        <div class="city-grid">
            <!-- Tashkent — large card -->
            <a href="#" class="city-card city-card--large" aria-label="Tashkent venues">
                <img class="city-card__img"
                     src="https://images.unsplash.com/photo-1596484552834-6a58f850e0a1?w=900&q=75"
                     alt="Tashkent skyline" loading="lazy">
                <div class="city-card__overlay"></div>
                <div class="city-card__info">
                    <span class="city-card__name">Tashkent</span>
                    <span class="city-card__venues">148 venues</span>
                </div>
            </a>

            <!-- Samarkand -->
            <a href="#" class="city-card" aria-label="Samarkand venues">
                <img class="city-card__img"
                     src="https://images.unsplash.com/photo-1565008576549-57569a49371d?w=600&q=75"
                     alt="Samarkand Registan" loading="lazy">
                <div class="city-card__overlay"></div>
                <div class="city-card__info">
                    <span class="city-card__name">Samarkand</span>
                    <span class="city-card__venues">54 venues</span>
                </div>
            </a>

            <!-- Bukhara -->
            <a href="#" class="city-card" aria-label="Bukhara venues">
                <img class="city-card__img"
                     src="https://images.unsplash.com/photo-1610629296786-7f7ef5783e3b?w=600&q=75"
                     alt="Bukhara old city" loading="lazy">
                <div class="city-card__overlay"></div>
                <div class="city-card__info">
                    <span class="city-card__name">Bukhara</span>
                    <span class="city-card__venues">31 venues</span>
                </div>
            </a>

            <!-- Namangan -->
            <a href="#" class="city-card" aria-label="Namangan venues">
                <img class="city-card__img"
                     src="https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=600&q=75"
                     alt="Namangan city" loading="lazy">
                <div class="city-card__overlay"></div>
                <div class="city-card__info">
                    <span class="city-card__name">Namangan</span>
                    <span class="city-card__venues">22 venues</span>
                </div>
            </a>

            <!-- Khiva -->
            <a href="#" class="city-card" aria-label="Khiva venues">
                <img class="city-card__img"
                     src="https://images.unsplash.com/photo-1497604401993-f2e922e5cb0a?w=600&q=75"
                     alt="Khiva old city walls" loading="lazy">
                <div class="city-card__overlay"></div>
                <div class="city-card__info">
                    <span class="city-card__name">Khiva</span>
                    <span class="city-card__venues">17 venues</span>
                </div>
            </a>
        </div>
    </div>
</section>

<!-- ============================================================
     PARTNERS STRIP
     ============================================================ -->
<section class="partners-strip" aria-label="Trusted partners">
    <div class="container">
        <div class="d-flex align-items-center flex-wrap gap-3">
            <span class="partners-strip__label">Trusted by</span>
            <span class="partner-logo">Uzbekistan Tourism</span>
            <span class="partner-logo">Hyatt Regency</span>
            <span class="partner-logo">ICE Tashkent</span>
            <span class="partner-logo">UzExpoCenter</span>
            <span class="partner-logo">Hilton Hotels</span>
            <span class="partner-logo">Silk Road Events</span>
        </div>
    </div>
</section>

<!-- ============================================================
     CTA BANNER
     ============================================================ -->
<section class="mice-section">
    <div class="container">
        <div class="mice-cta-banner">
            <h2>Ready to Host Your Event in Uzbekistan?</h2>
            <p>
                Join thousands of event planners who trust MICE Uzbekistan to find
                the perfect venue, negotiate rates, and manage logistics — all in one place.
            </p>
            <div class="d-flex justify-content-center flex-wrap gap-3">
                <a href="#" class="btn-cta-white">Start for Free</a>
                <a href="#" style="color:rgba(255,255,255,.75); font-weight:600; font-size:.9rem;
                   text-decoration:none; display:flex; align-items:center; gap:.4rem;">
                    Talk to an expert →
                </a>
            </div>
        </div>
    </div>
</section>
