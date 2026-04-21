<section class="mitra-section section-fh-sm" aria-label="Mitra Strategis">
    <div class="container">
        <div class="text-center mb-4">
            <p class="mitra-heading">DIPERCAYA OLEH MITRA TERKEMUKA</p>
        </div>
    </div>

    <div class="mitra-ticker-wrap">
        <div class="mitra-ticker" aria-hidden="true">
            <!-- Track 1 -->
            <div class="mitra-track">
                <div class="mitra-logo-item">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/a7/GE_Healthcare_logo.svg/2560px-GE_Healthcare_logo.svg.png"
                         alt="GE Healthcare" loading="lazy">
                </div>
                <div class="mitra-logo-item">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/b8/Siemens_Healthineers_logo.svg/2560px-Siemens_Healthineers_logo.svg.png"
                         alt="Siemens Healthineers" loading="lazy">
                </div>
                <div class="mitra-logo-item">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/4/4b/Philips_logo.svg/1200px-Philips_logo.svg.png"
                         alt="Philips Healthcare" loading="lazy">
                </div>
                <div class="mitra-logo-item">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/a0/Omron_logo.svg/1200px-Omron_logo.svg.png"
                         alt="Omron" loading="lazy">
                </div>
                <div class="mitra-logo-item">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/22/Samsung_Logo.svg/2560px-Samsung_Logo.svg.png"
                         alt="Samsung Medical" loading="lazy">
                </div>
                <!-- Duplicate for seamless loop -->
                <div class="mitra-logo-item">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/a7/GE_Healthcare_logo.svg/2560px-GE_Healthcare_logo.svg.png"
                         alt="GE Healthcare" loading="lazy">
                </div>
                <div class="mitra-logo-item">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/b8/Siemens_Healthineers_logo.svg/2560px-Siemens_Healthineers_logo.svg.png"
                         alt="Siemens Healthineers" loading="lazy">
                </div>
                <div class="mitra-logo-item">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/4/4b/Philips_logo.svg/1200px-Philips_logo.svg.png"
                         alt="Philips Healthcare" loading="lazy">
                </div>
                <div class="mitra-logo-item">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/a0/Omron_logo.svg/1200px-Omron_logo.svg.png"
                         alt="Omron" loading="lazy">
                </div>
                <div class="mitra-logo-item">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/22/Samsung_Logo.svg/2560px-Samsung_Logo.svg.png"
                         alt="Samsung Medical" loading="lazy">
                </div>
            </div>
        </div>
    </div>
</section>

<style>
.mitra-section {
    background: var(--fh-white);
    border-top: 1px solid var(--fh-border);
    border-bottom: 1px solid var(--fh-border);
}
.mitra-heading {
    font-size: 0.72rem;
    font-weight: 700;
    letter-spacing: 3px;
    color: var(--fh-text-muted);
    margin: 0;
    opacity: 0.7;
}

/* Ticker */
.mitra-ticker-wrap {
    overflow: hidden;
    -webkit-mask-image: linear-gradient(to right, transparent 0%, black 10%, black 90%, transparent 100%);
    mask-image: linear-gradient(to right, transparent 0%, black 10%, black 90%, transparent 100%);
}
.mitra-ticker { overflow: visible; }
.mitra-track {
    display: flex;
    width: max-content;
    animation: mitraTicker 28s linear infinite;
}
.mitra-track:hover { animation-play-state: paused; }
@keyframes mitraTicker {
    from { transform: translateX(0); }
    to   { transform: translateX(-50%); }
}

.mitra-logo-item {
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 16px 40px;
    flex-shrink: 0;
}
.mitra-logo-item img {
    height: 36px;
    width: auto;
    display: block;
    max-width: 130px;
    object-fit: contain;
    filter: grayscale(100%);
    opacity: 0.45;
    transition: all 0.4s ease;
}
.mitra-logo-item:hover img {
    filter: grayscale(0%);
    opacity: 1;
    transform: scale(1.05);
}

@media (max-width: 767.98px) {
    .mitra-logo-item { padding: 12px 24px; }
    .mitra-logo-item img { height: 28px; }
}
</style>