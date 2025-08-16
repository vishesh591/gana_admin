<div class="content-page">
        <div class="content">
            <div class="container-xxl">
                <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column justify-content-between">
                    <div class="flex-grow-1">
                        <h4 class="fs-18 fw-semibold m-0">Review Release - <span class="current-step-title">Metadata</span></h4>
                    </div>
                </div>

                <div class="step-indicator-container">
                    <div class="step-indicator d-flex justify-content-between position-relative">
                        <div class="progress-line" id="progressLine"></div>
                        <div class="step active" data-step="1"><span class="step-number">1</span><span class="step-title">Metadata</span></div>
                        <div class="step" data-step="2"><span class="step-number">2</span><span class="step-title">Uploads</span></div>
                        <div class="step" data-step="3"><span class="step-number">3</span><span class="step-title">Stores</span></div>
                        <div class="step" data-step="4"><span class="step-number">4</span><span class="step-title">Date & Price</span></div>
                    </div>
                </div>

                <form id="releaseForm">
                    <div class="step-content active" id="step-1">
                        <div class="form-section">
                            <h5>Artwork</h5>
                            <p class="text-center"><em>Artwork would be displayed here.</em></p>
                        </div>
                        <div class="form-section">
                            <h5>Basic Information</h5>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="releaseTitle" class="form-label required-field">Title</label>
                                    <input type="text" class="form-control" id="releaseTitle" value="Cosmic Drift" readonly>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label required-field">Label Name</label>
                                    <input type="text" class="form-control" value="Stardust Records" readonly>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="artist" class="form-label required-field">Artist</label>
                                    <input type="text" class="form-control" id="artist" value="Orion Sun" readonly>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Featuring Artist</label>
                                    <input type="text" class="form-control" value="Luna" readonly>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label required-field">Release Type</label>
                                    <div class="form-check"><input class="form-check-input" type="radio" name="releaseType" checked disabled><label class="form-check-label">Single</label></div>
                                    <div class="form-check"><input class="form-check-input" type="radio" name="releaseType" disabled><label class="form-check-label">EP</label></div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="genre" class="form-label required-field">Genre</label>
                                    <select class="form-select" id="genre" disabled><option selected>Electronic</option></select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="mood" class="form-label required-field">Mood</label>
                                    <select class="form-select" id="mood" disabled><option selected>Chill</option></select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label mb-0">UPC/EAN</label>
                                    <input type="text" class="form-control" value="198009123456" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end mt-4">
                            <button type="button" class="btn btn-primary next-step" data-next="2">Next: Uploads</button>
                        </div>
                    </div>

                    <div class="step-content" id="step-2">
                        <div class="form-section">
                            <h5>Track Information</h5>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label required-field">Title</label>
                                    <input type="text" class="form-control" value="Cosmic Drift" readonly>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label required-field">Secondary Track Type</label>
                                    <select class="form-select" disabled><option selected>Original</option></select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label required-field">Instrumental</label>
                                    <div class="form-check"><input class="form-check-input" type="radio" name="instrumental" disabled><label class="form-check-label">Yes</label></div>
                                    <div class="form-check"><input class="form-check-input" type="radio" name="instrumental" checked disabled><label class="form-check-label">No</label></div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label mb-0">ISRC</label>
                                    <input type="text" class="form-control" value="US1232500004" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="form-section">
                            <h5>Audio File</h5>
                            <p class="text-center"><em>Uploaded Audio File: Cosmic_Drift_Master.wav</em></p>
                        </div>
                        <div class="d-flex justify-content-between mt-4">
                            <button type="button" class="btn btn-outline-secondary prev-step" data-prev="1">Previous</button>
                            <button type="button" class="btn btn-primary next-step" data-next="3">Next: Stores</button>
                        </div>
                    </div>

                    <div class="step-content" id="step-3">
                        <div class="form-section">
                            <h5>Music Stores</h5>
                            <div class="store-checkbox-group">
                                <div class="form-check"><input class="form-check-input" type="checkbox" checked disabled><label>24-7 Entertainment</label></div>
                                <div class="form-check"><input class="form-check-input" type="checkbox" checked disabled><label>Amazon Music</label></div>
                                <div class="form-check"><input class="form-check-input" type="checkbox" checked disabled><label>Spotify</label></div>
                                <div class="form-check"><input class="form-check-input" type="checkbox" checked disabled><label>Apple Music</label></div>
                                <div class="store-checkbox-item">
  <div class="store-checkbox-item">
    <div class="form-check">
        <input class="form-check-input" type="checkbox" id="store-ami-entertainment" value="ami-entertainment" checked disabled>
        <label>AMI Entertainment</label>
    </div>
</div>
<div class="store-checkbox-item">
    <div class="form-check">
        <input class="form-check-input" type="checkbox" id="store-anghami" value="anghami" checked disabled>
        <label>Anghami</label>
    </div>
</div>
<div class="store-checkbox-item">
    <div class="form-check">
        <input class="form-check-input" type="checkbox" id="store-aspiro-tidal-wimp" value="aspiro-tidal-wimp" checked disabled>
        <label>Aspiro (Tidal / WiMP)</label>
    </div>
</div>
<div class="store-checkbox-item">
    <div class="form-check">
        <input class="form-check-input" type="checkbox" id="store-audible-magic" value="audible-magic" checked disabled>
        <label>Audible Magic</label>
    </div>
</div>
<div class="store-checkbox-item">
    <div class="form-check">
        <input class="form-check-input" type="checkbox" id="store-audiomack" value="audiomack" checked disabled>
        <label>Audiomack</label>
    </div>
</div>
<div class="store-checkbox-item">
    <div class="form-check">
        <input class="form-check-input" type="checkbox" id="store-awa" value="awa" checked disabled>
        <label>AWA</label>
    </div>
</div>
<div class="store-checkbox-item">
    <div class="form-check">
        <input class="form-check-input" type="checkbox" id="store-bmat" value="bmat" checked disabled>
        <label>BMAT</label>
    </div>
</div>
<div class="store-checkbox-item">
    <div class="form-check">
        <input class="form-check-input" type="checkbox" id="store-boomplay" value="boomplay" checked disabled>
        <label>Boomplay</label>
    </div>
</div>
<div class="store-checkbox-item">
    <div class="form-check">
        <input class="form-check-input" type="checkbox" id="store-deezer" value="deezer" checked disabled>
        <label>Deezer</label>
    </div>
</div>
<div class="store-checkbox-item">
    <div class="form-check">
        <input class="form-check-input" type="checkbox" id="store-disco-virgin-music-group" value="disco-virgin-music-group" checked disabled>
        <label>DISCO (Virgin Music Group)</label>
    </div>
</div>
<div class="store-checkbox-item">
    <div class="form-check">
        <input class="form-check-input" type="checkbox" id="store-flo" value="flo" checked disabled>
        <label>FLO</label>
    </div>
</div>
<div class="store-checkbox-item">
    <div class="form-check">
        <input class="form-check-input" type="checkbox" id="store-facebook" value="facebook" checked disabled>
        <label>Facebook</label>
    </div>
</div>
<div class="store-checkbox-item">
    <div class="form-check">
        <input class="form-check-input" type="checkbox" id="store-fit-radio" value="fit-radio" checked disabled>
        <label>Fit Radio</label>
    </div>
</div>
<div class="store-checkbox-item">
    <div class="form-check">
        <input class="form-check-input" type="checkbox" id="store-fizy" value="fizy" checked disabled>
        <label>Fizy</label>
    </div>
</div>
<div class="store-checkbox-item">
    <div class="form-check">
        <input class="form-check-input" type="checkbox" id="store-gaana" value="gaana" checked disabled>
        <label>Gaana</label>
    </div>
</div>
<div class="store-checkbox-item">
    <div class="form-check">
        <input class="form-check-input" type="checkbox" id="store-genie-music" value="genie-music" checked disabled>
        <label>Genie Music</label>
    </div>
</div>
<div class="store-checkbox-item">
    <div class="form-check">
        <input class="form-check-input" type="checkbox" id="store-gracenote" value="gracenote" checked disabled>
        <label>Gracenote</label>
    </div>
</div>
<div class="store-checkbox-item">
    <div class="form-check">
        <input class="form-check-input" type="checkbox" id="store-claro-musica" value="claro-musica" checked disabled>
        <label>Claro Música</label>
    </div>
</div>
<div class="store-checkbox-item">
    <div class="form-check">
        <input class="form-check-input" type="checkbox" id="store-apple-itunes-apple-music" value="apple-itunes-apple-music" checked disabled>
        <label>Apple (iTunes / Apple Music)</label>
    </div>
</div>
<div class="store-checkbox-item">
    <div class="form-check">
        <input class="form-check-input" type="checkbox" id="store-jaxsta" value="jaxsta" checked disabled>
        <label>Jaxsta</label>
    </div>
</div>
<div class="store-checkbox-item">
    <div class="form-check">
        <input class="form-check-input" type="checkbox" id="store-joox" value="joox" checked disabled>
        <label>Joox</label>
    </div>
</div>
<div class="store-checkbox-item">
    <div class="form-check">
        <input class="form-check-input" type="checkbox" id="store-melon" value="melon" checked disabled>
        <label>Melon</label>
    </div>
</div>
<div class="store-checkbox-item">
    <div class="form-check">
        <input class="form-check-input" type="checkbox" id="store-kantar-france" value="kantar-france" checked disabled>
        <label>Kantar (France)</label>
    </div>
</div>
<div class="store-checkbox-item">
    <div class="form-check">
        <input class="form-check-input" type="checkbox" id="store-kkbox" value="kkbox" checked disabled>
        <label>KKBox</label>
    </div>
</div>
<div class="store-checkbox-item">
    <div class="form-check">
        <input class="form-check-input" type="checkbox" id="store-kuack-media-group" value="kuack-media-group" checked disabled>
        <label>Kuack Media Group</label>
    </div>
</div>
<div class="store-checkbox-item">
    <div class="form-check">
        <input class="form-check-input" type="checkbox" id="store-mdundo" value="mdundo" checked disabled>
        <label>mdundo</label>
    </div>
</div>
<div class="store-checkbox-item">
    <div class="form-check">
        <input class="form-check-input" type="checkbox" id="store-medianet" value="medianet" checked disabled>
        <label>MediaNet</label>
    </div>
</div>
<div class="store-checkbox-item">
    <div class="form-check">
        <input class="form-check-input" type="checkbox" id="store-kantar-uk" value="kantar-uk" checked disabled>
        <label>Kantar (UK)</label>
    </div>
</div>
<div class="store-checkbox-item">
    <div class="form-check">
        <input class="form-check-input" type="checkbox" id="store-mood-media-playnetwork" value="mood-media-playnetwork" checked disabled>
        <label>Mood Media/Playnetwork</label>
    </div>
</div>
<div class="store-checkbox-item">
    <div class="form-check">
        <input class="form-check-input" type="checkbox" id="store-moov" value="moov" checked disabled>
        <label>MOOV</label>
    </div>
</div>
<div class="store-checkbox-item">
    <div class="form-check">
        <input class="form-check-input" type="checkbox" id="store-muud" value="muud" checked disabled>
        <label>muud</label>
    </div>
</div>
<div class="store-checkbox-item">
    <div class="form-check">
        <input class="form-check-input" type="checkbox" id="store-vibe" value="vibe" checked disabled>
        <label>VIBE</label>
    </div>
</div>
<div class="store-checkbox-item">
    <div class="form-check">
        <input class="form-check-input" type="checkbox" id="store-nct-nhaccuatui" value="nct-nhaccuatui" checked disabled>
        <label>NCT (NhacCuaTui)</label>
    </div>
</div>
<div class="store-checkbox-item">
    <div class="form-check">
        <input class="form-check-input" type="checkbox" id="store-netease" value="netease" checked disabled>
        <label>NetEase</label>
    </div>
</div>
<div class="store-checkbox-item">
    <div class="form-check">
        <input class="form-check-input" type="checkbox" id="store-bugs" value="bugs" checked disabled>
        <label>Bugs</label>
    </div>
</div>
<div class="store-checkbox-item">
    <div class="form-check">
        <input class="form-check-input" type="checkbox" id="store-line-music" value="line-music" checked disabled>
        <label>Line Music</label>
    </div>
</div>
<div class="store-checkbox-item">
    <div class="form-check">
        <input class="form-check-input" type="checkbox" id="store-pandora" value="pandora" checked disabled>
        <label>Pandora</label>
    </div>
</div>
<div class="store-checkbox-item">
    <div class="form-check">
        <input class="form-check-input" type="checkbox" id="store-rx-music" value="rx-music" checked disabled>
        <label>RX Music</label>
    </div>
</div>
<div class="store-checkbox-item">
    <div class="form-check">
        <input class="form-check-input" type="checkbox" id="store-peloton" value="peloton" checked disabled>
        <label>Peloton</label>
    </div>
</div>
<div class="store-checkbox-item">
    <div class="form-check">
        <input class="form-check-input" type="checkbox" id="store-pex" value="pex" checked disabled>
        <label>Pex</label>
    </div>
</div>
<div class="store-checkbox-item">
    <div class="form-check">
        <input class="form-check-input" type="checkbox" id="store-phononet" value="phononet" checked disabled>
        <label>Phononet</label>
    </div>
</div>
<div class="store-checkbox-item">
    <div class="form-check">
        <input class="form-check-input" type="checkbox" id="store-qishui-yinyue" value="qishui-yinyue" checked disabled>
        <label>Qishui Yinyue</label>
    </div>
</div>
<div class="store-checkbox-item">
    <div class="form-check">
        <input class="form-check-input" type="checkbox" id="store-qobuz" value="qobuz" checked disabled>
        <label>Qobuz</label>
    </div>
</div>
<div class="store-checkbox-item">
    <div class="form-check">
        <input class="form-check-input" type="checkbox" id="store-tencent-kugou-kowu-qq-music" value="tencent-kugou-kowu-qq-music" checked disabled>
        <label>Tencent (KuGou / Kowu / QQ Music)</label>
    </div>
</div>
<div class="store-checkbox-item">
    <div class="form-check">
        <input class="form-check-input" type="checkbox" id="store-recochoku" value="recochoku" checked disabled>
        <label>RecoChoku</label>
    </div>
</div>
<div class="store-checkbox-item">
    <div class="form-check">
        <input class="form-check-input" type="checkbox" id="store-napster" value="napster" checked disabled>
        <label>Napster</label>
    </div>
</div>
<div class="store-checkbox-item">
    <div class="form-check">
        <input class="form-check-input" type="checkbox" id="store-jiosaavn" value="jiosaavn" checked disabled>
        <label>JioSaavn</label>
    </div>
</div>
<div class="store-checkbox-item">
    <div class="form-check">
        <input class="form-check-input" type="checkbox" id="store-liveone-livexlive" value="liveone-livexlive" checked disabled>
        <label>LiveOne (LiveXLive)</label>
    </div>
</div>
<div class="store-checkbox-item">
    <div class="form-check">
        <input class="form-check-input" type="checkbox" id="store-soundcloud-content-id" value="soundcloud-content-id" checked disabled>
        <label>SoundCloud (Content ID)</label>
    </div>
</div>
<div class="store-checkbox-item">
    <div class="form-check">
        <input class="form-check-input" type="checkbox" id="store-soundcloud-go" value="soundcloud-go" checked disabled>
        <label>SoundCloud Go</label>
    </div>
</div>
<div class="store-checkbox-item">
    <div class="form-check">
        <input class="form-check-input" type="checkbox" id="store-soundexchange" value="soundexchange" checked disabled>
        <label>SoundExchange</label>
    </div>
</div>
<div class="store-checkbox-item">
    <div class="form-check">
        <input class="form-check-input" type="checkbox" id="store-spotify" value="spotify" checked disabled>
        <label>Spotify</label>
    </div>
</div>
<div class="store-checkbox-item">
    <div class="form-check">
        <input class="form-check-input" type="checkbox" id="store-iim-starlux" value="iim-starlux" checked disabled>
        <label>IIM / Starlux</label>
    </div>
</div>
<div class="store-checkbox-item">
    <div class="form-check">
        <input class="form-check-input" type="checkbox" id="store-stellarentertainment" value="stellarentertainment" checked disabled>
        <label>StellarEntertainment</label>
    </div>
</div>
<div class="store-checkbox-item">
    <div class="form-check">
        <input class="form-check-input" type="checkbox" id="store-supernatural" value="supernatural" checked disabled>
        <label>Supernatural</label>
    </div>
</div>
<div class="store-checkbox-item">
    <div class="form-check">
        <input class="form-check-input" type="checkbox" id="store-cubomusica" value="cubomusica" checked disabled>
        <label>Cubomusica</label>
    </div>
</div>
<div class="store-checkbox-item">
    <div class="form-check">
        <input class="form-check-input" type="checkbox" id="store-iheartradio" value="iheartradio" checked disabled>
        <label>iHeartRadio</label>
    </div>
</div>
<div class="store-checkbox-item">
    <div class="form-check">
        <input class="form-check-input" type="checkbox" id="store-tiktok" value="tiktok" checked disabled>
        <label>TikTok</label>
    </div>
</div>
<div class="store-checkbox-item">
    <div class="form-check">
        <input class="form-check-input" type="checkbox" id="store-tivo" value="tivo" checked disabled>
        <label>TiVo</label>
    </div>
</div>
<div class="store-checkbox-item">
    <div class="form-check">
        <input class="form-check-input" type="checkbox" id="store-touchtunes" value="touchtunes" checked disabled>
        <label>TouchTunes</label>
    </div>
</div>
<div class="store-checkbox-item">
    <div class="form-check">
        <input class="form-check-input" type="checkbox" id="store-trebel" value="trebel" checked disabled>
        <label>Trebel</label>
    </div>
</div>
<div class="store-checkbox-item">
    <div class="form-check">
        <input class="form-check-input" type="checkbox" id="store-tunedglobal" value="tunedglobal" checked disabled>
        <label>TunedGlobal</label>
    </div>
</div>
<div class="store-checkbox-item">
    <div class="form-check">
        <input class="form-check-input" type="checkbox" id="store-audible-magic-for-twitch-dj" value="audible-magic-for-twitch-dj" checked disabled>
        <label>Audible Magic for Twitch DJ</label>
    </div>
</div>
<div class="store-checkbox-item">
    <div class="form-check">
        <input class="form-check-input" type="checkbox" id="store-vervelife" value="vervelife" checked disabled>
        <label>VerveLife</label>
    </div>
</div>
<div class="store-checkbox-item">
    <div class="form-check">
        <input class="form-check-input" type="checkbox" id="store-yango-play" value="yango-play" checked disabled>
        <label>Yango Play</label>
    </div>
</div>
<div class="store-checkbox-item">
    <div class="form-check">
        <input class="form-check-input" type="checkbox" id="store-youtube-content-id" value="youtube-content-id" checked disabled>
        <label>YouTube (Content ID)</label>
    </div>
</div>
<div class="store-checkbox-item">
    <div class="form-check">
        <input class="form-check-input" type="checkbox" id="store-youtube-music" value="youtube-music" checked disabled>
        <label>YouTube Music</label>
    </div>
</div>
<div class="store-checkbox-item">
    <div class="form-check">
        <input class="form-check-input" type="checkbox" id="store-zing-mp3" value="zing-mp3" checked disabled>
        <label>Zing MP3</label>
    </div>
</div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between mt-4">
                            <button type="button" class="btn btn-outline-secondary prev-step" data-prev="2">Previous</button>
                            <button type="button" class="btn btn-primary next-step" data-next="4">Next: Date & Price</button>
                        </div>
                    </div>
</div>
                    <div class="step-content" id="step-4">
                        <div class="form-section">
                            <h5>Release Dates</h5>
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label class="form-label required-field">Release Date</label>
                                    <input type="date" class="form-control" value="2025-08-15" readonly>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">Pre-Sale Date</label>
                                    <input type="date" class="form-control" value="2025-08-01" readonly>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label class="form-label required-field">Original Release Date</label>
                                    <input type="date" class="form-control" value="2025-08-15" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="form-section">
                            <h5>Pricing</h5>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label required-field">Release Price</label>
                                    <select class="form-select" disabled><option selected>1.29 rupee</option></select>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between mt-4">
                            <button type="button" class="btn btn-outline-secondary prev-step" data-prev="3">Previous</button>
                        </div>

                         <div class="form-section text-center mt-4">
                            <h5>Final Action</h5>
                            <p class="text-muted">Review the release details above and take a final action.</p>
                            <div class="d-flex justify-content-center gap-3 mt-3">
                                <a href="/claiming-request" type="button" id="approveBtn" class="btn btn-success btn-lg rounded-pill px-5"><i data-feather="check-circle" class="me-2"></i>Approve Release</a>
                                <a href="/claiming-request" type="button" id="rejectBtn" class="btn btn-danger btn-lg rounded-pill px-5"><i data-feather="x-circle" class="me-2"></i>Reject Release</a>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>