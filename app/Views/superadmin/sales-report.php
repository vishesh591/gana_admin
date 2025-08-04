<div class="content-page">
      <div class="content">
        <!-- 1. Page Header -->
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h1 class="page-title">Sales Reports</h1>
                </div>
                <div class="col-auto">
                    <button class="btn btn-orange">
                        <i data-feather="download"></i> Export CSV
                    </button>
                </div>
            </div>
            <div class="header-divider"></div>
        </div>

        <div class="content-container">
            <!-- 2. Filter Section -->
            <div class="card filter-section">
                <div class="card-body">
                    <h5 class="card-title mb-3">Filters</h5>
                    <div class="row g-3">
                        <div class="col-md-2 col-6">
                            <label class="form-label small">Date Range</label>
                            <select class="form-select">
                                <option selected>All Time</option>
                                <option>Last 7 Days</option>
                                <option>Last 30 Days</option>
                                <option>Last 90 Days</option>
                                <option>Custom Range</option>
                            </select>
                        </div>
                        <div class="col-md-2 col-6">
                            <label class="form-label small">Month</label>
                            <select class="form-select">
                                <option selected>All Months</option>
                                <option>January 2023</option>
                                <option>February 2023</option>
                                <option>March 2023</option>
                            </select>
                        </div>
                        <div class="col-md-2 col-6">
                            <label class="form-label small">Store</label>
                            <select class="form-select">
                                <option selected>All Stores</option>
                                <option>Spotify</option>
                                <option>Apple Music</option>
                                <option>Amazon Music</option>
                            </select>
                        </div>
                        <div class="col-md-2 col-6">
                            <label class="form-label small">Label</label>
                            <select class="form-select">
                                <option selected>All Labels</option>
                                <option>Universal Music</option>
                                <option>Sony Music</option>
                                <option>Warner Music</option>
                            </select>
                        </div>
                        <div class="col-md-2 col-6">
                            <label class="form-label small">Track</label>
                            <select class="form-select">
                                <option selected>All Tracks</option>
                                <option>Popular Tracks</option>
                            </select>
                        </div>
                        <div class="col-md-2 col-6 d-flex align-items-end">
                            <button class="btn btn-primary w-100">Apply</button>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-12 d-flex gap-2 filter-buttons">
                            <button class="btn btn-secondary flex-grow-1">
                                <i data-feather="refresh-cw"></i> Reset Filters
                            </button>
                            <button class="btn btn-outline-secondary flex-grow-1">
                                <i data-feather="save"></i> Save Preset
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 3. Summary Metric Cards -->
            <div class="row metric-cards">
                <div class="col-md-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="card-subtitle mb-2 text-muted">Total Streams</h6>
                                    <h3 class="card-title mb-0">1,245,678</h3>
                                </div>
                                <div class="bg-primary bg-opacity-10 p-3 rounded">
                                    <i data-feather="activity" class="text-primary"></i>
                                </div>
                            </div>
                            <div class="mt-3">
                                <span class="text-success"><i data-feather="trending-up" class="icon-sm me-1"></i> 12.5%</span>
                                <span class="text-muted ms-2">vs last period</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="card-subtitle mb-2 text-muted">Total Earnings</h6>
                                    <h3 class="card-title mb-0 text-success">$8,245.75</h3>
                                </div>
                                <div class="bg-success bg-opacity-10 p-3 rounded">
                                    <i data-feather="dollar-sign" class="text-success"></i>
                                </div>
                            </div>
                            <div class="mt-3">
                                <span class="text-success"><i data-feather="trending-up" class="icon-sm me-1"></i> 8.3%</span>
                                <span class="text-muted ms-2">vs last period</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="card-subtitle mb-2 text-muted">Top Store / Track</h6>
                                    <h3 class="card-title mb-0">Spotify</h3>
                                    <p class="mb-0 text-muted">"Summer Vibes"</p>
                                </div>
                                <div class="bg-warning bg-opacity-10 p-3 rounded">
                                    <i data-feather="award" class="text-warning"></i>
                                </div>
                            </div>
                            <div class="mt-3">
                                <span class="text-muted">452,109 streams</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 4. Data Table Section -->
            <div class="card mt-4">
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead class="table-dark">
                                <tr>
                                    <th>Month</th>
                                    <th>Store</th>
                                    <th>Label</th>
                                    <th>Track</th>
                                    <th>Country</th>
                                    <th>Sale Type</th>
                                    <th class="text-end">Streams</th>
                                    <th class="text-end">Revenue</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Sample Data Rows -->
                                <tr>
                                    <td>Jan 2023</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img src="https://via.placeholder.com/24" alt="Spotify" class="rounded-circle me-2" width="24" height="24">
                                            Spotify
                                        </div>
                                    </td>
                                    <td>Universal Music</td>
                                    <td>Summer Vibes</td>
                                    <td>United States</td>
                                    <td><span class="badge bg-primary">Premium Stream</span></td>
                                    <td class="text-end">12,450</td>
                                    <td class="text-end text-success">$42.15</td>
                                </tr>
                                <tr>
                                    <td>Jan 2023</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img src="https://via.placeholder.com/24" alt="Apple Music" class="rounded-circle me-2" width="24" height="24">
                                            Apple Music
                                        </div>
                                    </td>
                                    <td>Sony Music</td>
                                    <td>Midnight Groove</td>
                                    <td>United Kingdom</td>
                                    <td><span class="badge bg-success">Paid Download</span></td>
                                    <td class="text-end">8,732</td>
                                    <td class="text-end text-success">$58.90</td>
                                </tr>
                                <tr>
                                    <td>Dec 2022</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img src="https://via.placeholder.com/24" alt="Amazon Music" class="rounded-circle me-2" width="24" height="24">
                                            Amazon Music
                                        </div>
                                    </td>
                                    <td>Warner Music</td>
                                    <td>Urban Dreams</td>
                                    <td>Germany</td>
                                    <td><span class="badge bg-secondary">Free Stream</span></td>
                                    <td class="text-end">23,109</td>
                                    <td class="text-end text-success">$12.75</td>
                                </tr>
                                <tr>
                                    <td>Dec 2022</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img src="https://via.placeholder.com/24" alt="YouTube Music" class="rounded-circle me-2" width="24" height="24">
                                            YouTube Music
                                        </div>
                                    </td>
                                    <td>Independent</td>
                                    <td>Acoustic Sessions</td>
                                    <td>Canada</td>
                                    <td><span class="badge bg-info">Video Stream</span></td>
                                    <td class="text-end">15,672</td>
                                    <td class="text-end text-success">$28.40</td>
                                </tr>
                                <tr>
                                    <td>Nov 2022</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img src="https://via.placeholder.com/24" alt="Deezer" class="rounded-circle me-2" width="24" height="24">
                                            Deezer
                                        </div>
                                    </td>
                                    <td>Universal Music</td>
                                    <td>Electronic Pulse</td>
                                    <td>France</td>
                                    <td><span class="badge bg-primary">Premium Stream</span></td>
                                    <td class="text-end">9,845</td>
                                    <td class="text-end text-success">$33.25</td>
                                </tr>
                            </tbody>
                        </table>
                        
                        <!-- Empty State (hidden by default) -->
                        <div class="empty-state d-none">
                            <div class="empty-state-content">
                                <i data-feather="bar-chart-2" class="empty-state-icon"></i>
                                <h5>No sales data available</h5>
                                <p class="text-muted">Try adjusting your filters or check back later</p>
                                <button class="btn btn-primary mt-3">Reset Filters</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 5. Pagination Section -->
            <div class="row pagination-container">
                <div class="col-sm-12 col-md-6">
                    <div class="dataTables_info">Showing 1 to 5 of 24 entries</div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="d-flex justify-content-end">
                        <nav aria-label="Page navigation">
                            <ul class="pagination">
                                <li class="page-item disabled">
                                    <a class="page-link" href="#" tabindex="-1">Previous</a>
                                </li>
                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#">Next</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </div>