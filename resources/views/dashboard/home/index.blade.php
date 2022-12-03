@extends('dashboard.layouts.main')
@section('title')
    Dashboard Home
@endsection

@section('container')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Home /</span> Dashboard</h4>

        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-4 col-12 mb-md-0 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <div id="jeniskelamin"></div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-8 col-12">
                        <div class="card">
                            <div class="card-body">
                                <div id="agama"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row my-3">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12 col-12 mb-md-0 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <div id="pendidikan"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row my-3">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12 col-12 mb-md-0 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <div id="hub"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

@section('script')
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/highcharts-3d.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>

    <script>
        Highcharts.chart('jeniskelamin', {
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            colors: ['#0FAFF3', '#FFC0CB'],
            title: {
                text: 'Perbandingan Jenis Kelamin'
            },
            tooltip: {
                headerFormat: '<b>{point.key}</b><br>',
                pointFormat: '{series.name}: {point.y} orang = <b>{point.percentage:.1f}%</b>'
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: false
                    },
                    point: {
                        events: {
                            click: function() {
                                window.location.href = this.website;
                            }
                        }
                    },
                    showInLegend: true
                }
            },
            series: [{
                name: 'Warga',
                colorByPoint: true,
                data: [{
                    name: 'Laki-laki',
                    y: {{ $laki }},
                    website: 'dashboard/villagers?gender=1',
                }, {
                    name: 'Perempuan',
                    y: {{ $perempuan }},
                    website: 'dashboard/villagers?gender=2',
                }]
            }]
        });
    </script>

    <script>
        Highcharts.chart('agama', {
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'column',
                options3d: {
                    enabled: true,
                    alpha: 15,
                    beta: 5,
                    depth: 70,
                    viewDistance: 25,
                }
            },
            colors: ['#009000', '#C162D8', '#EEB89D', '#E0E0E0', '#FFFF00', '#FF0000', '#808080'],
            title: {
                text: 'Agama'
            },
            xAxis: {
                categories: ['Islam', 'Kristen', 'Katholik', 'Hindu', 'Budha', 'Kong Hucu',
                    'Kepercayaan Terhadap Tuhan Yang Maha Esa'
                ]
            },
            yAxis: {
                title: {
                    enabled: false
                },
            },
            tooltip: {
                headerFormat: '<b>{point.key}</b><br>',
                pointFormat: '{point.y} Orang</b>'
            },
            plotOptions: {
                column: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: false
                    },
                    point: {
                        events: {
                            click: function() {
                                window.location.href = this.website;
                            }
                        }
                    },
                    showInLegend: true
                }
            },
            series: [{
                name: 'Warga',
                colorByPoint: true,
                data: [{
                    name: 'Islam',
                    y: {{ $islam }},
                    website: 'dashboard/villagers?religion=1',
                }, {
                    name: 'Kristen',
                    y: {{ $kristen }},
                    website: 'dashboard/villagers?religion=2',
                }, {
                    name: 'Katholik',
                    y: {{ $katholik }},
                    website: 'dashboard/villagers?religion=3',
                }, {
                    name: 'Hindu',
                    y: {{ $hindu }},
                    website: 'dashboard/villagers?religion=4',
                }, {
                    name: 'Budha',
                    y: {{ $budha }},
                    website: '/dashboard/villagers?religion=5',
                }, {
                    name: 'Kong Hucu',
                    y: {{ $konghucu }},
                    website: '/dashboard/villagers?religion=6',
                }, {
                    name: 'Kepercayaan Terhadap Tuhan Yang Maha Esa',
                    y: {{ $kttyme }},
                    website: '/dashboard/villagers?religion=7',
                }]
            }]
        });

        function showValues() {
            document.getElementById('alpha-value').innerHTML = chart.options.chart.options3d.alpha;
            document.getElementById('beta-value').innerHTML = chart.options.chart.options3d.beta;
            document.getElementById('depth-value').innerHTML = chart.options.chart.options3d.depth;
        }

        document.querySelectorAll('#sliders input').forEach(input => input.addEventListener('input', e => {
            chart.options.chart.options3d[e.target.id] = parseFloat(e.target.value);
            showValues();
            chart.redraw(false);
        }));
    </script>

    <script>
        Highcharts.chart('pendidikan', {
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'line'
            },
            colors: ['#CC0000', '#0000FF', '#FFC0CB', '#80FF00', '#FF007F', '#FFF93C', '#9933FF', '#009999',
                '#C0C0C0', '#CCFF99', '#CCE5FF'
            ],
            title: {
                text: 'Pendidikan'
            },
            xAxis: {
                categories: ['Tidak/Belum Sekolah', 'Belum Tamat SD/Sederajat', 'Tamat SD/Sederajat',
                    'SLTP/Sederajat', 'SLTA/Sederajat', 'Diploma I/II', 'Akademi/Diploma III/Sarjana Muda',
                    'Diploma IV/Strata I', 'Strata II', 'Strata III'
                ]
            },
            yAxis: {
                title: {
                    enabled: false
                },
            },
            tooltip: {
                headerFormat: '<b>{point.key}</b><br>',
                pointFormat: '{point.y} Orang</b>'
            },
            plotOptions: {
                line: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: false
                    },
                    point: {
                        events: {
                            click: function() {
                                window.location.href = this.website;
                            }
                        }
                    },
                    showInLegend: true
                }
            },
            series: [{
                name: 'Warga',
                colorByPoint: true,
                data: [{
                    name: 'Tidak/Belum Sekolah',
                    y: {{ $tidak_belum_sekolah }},
                    website: 'dashboard/villagers?education=1',
                }, {
                    name: 'Belum Tamat SD/Sederajat',
                    y: {{ $belum_tamat_sd_sederajat }},
                    website: 'dashboard/villagers?education=2',
                }, {
                    name: 'Tamat SD/Sederajat',
                    y: {{ $tamat_sd_sederajat }},
                    website: 'dashboard/villagers?education=3',
                }, {
                    name: 'SLTP/Sederajat',
                    y: {{ $sltp_sederajat }},
                    website: 'dashboard/villagers?education=4',
                }, {
                    name: 'SLTA/Sederajat',
                    y: {{ $slta_sederajat }},
                    website: 'dashboard/villagers?education=5',
                }, {
                    name: 'Diploma I/II',
                    y: {{ $diploma_i_ii }},
                    website: 'dashboard/villagers?education=6',
                }, {
                    name: 'Akademi/Diploma III/Sarjana Muda',
                    y: {{ $akademi_diploma_iii_sarjana_muda }},
                    website: 'dashboard/villagers?education=7',
                }, {
                    name: 'Diploma IV/Strata I',
                    y: {{ $diploma_iv_strata_i }},
                    website: 'dashboard/villagers?education=8',
                }, {
                    name: 'Strata II',
                    y: {{ $strata_ii }},
                    website: 'dashboard/villagers?education=9',
                }, {
                    name: 'Strata III',
                    y: {{ $strata_iii }},
                    website: 'dashboard/villagers?education=10',
                }]
            }]
        });
    </script>

    <script>
        Highcharts.chart('hub', {
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'column'
            },
            colors: ['#CC0000', '#0000FF', '#FFC0CB', '#80FF00', '#FF007F', '#FFF93C', '#9933FF', '#009999',
                '#C0C0C0', '#CCFF99', '#CCE5FF'
            ],
            title: {
                text: 'Status Hubungan Dalam Keluarga'
            },
            xAxis: {
                categories: ['Kepala Keluarga', 'Suami', 'Istri', 'Anak', 'Menantu', 'Cucu',
                    'Orang Tua', 'Mertua', 'Famili Lain', 'Pembantu', 'Lainnya'
                ]
            },
            yAxis: {
                title: {
                    enabled: false
                },
            },
            tooltip: {
                headerFormat: '<b>{point.key}</b><br>',
                pointFormat: '{point.y} Orang</b>'
            },
            plotOptions: {
                column: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: false
                    },
                    point: {
                        events: {
                            click: function() {
                                window.location.href = this.website;
                            }
                        }
                    },
                    showInLegend: true
                }
            },
            series: [{
                name: 'Warga',
                colorByPoint: true,
                data: [{
                    name: 'Kepala Keluarga',
                    y: {{ $kepala_keluarga }},
                    website: 'dashboard/villagers?familyrelation=1',
                }, {
                    name: 'Suami',
                    y: {{ $suami }},
                    website: 'dashboard/villagers?familyrelation=2',
                }, {
                    name: 'Istri',
                    y: {{ $istri }},
                    website: 'dashboard/villagers?familyrelation=3',
                }, {
                    name: 'Anak',
                    y: {{ $anak }},
                    website: 'dashboard/villagers?familyrelation=4',
                }, {
                    name: 'Menantu',
                    y: {{ $menantu }},
                    website: 'dashboard/villagers?familyrelation=5',
                }, {
                    name: 'Cucu',
                    y: {{ $cucu }},
                    website: 'dashboard/villagers?familyrelation=6',
                }, {
                    name: 'Orang Tua',
                    y: {{ $orang_tua }},
                    website: 'dashboard/villagers?familyrelation=7',
                }, {
                    name: 'Mertua',
                    y: {{ $mertua }},
                    website: 'dashboard/villagers?familyrelation=8',
                }, {
                    name: 'Famili Lain',
                    y: {{ $famili_lain }},
                    website: 'dashboard/villagers?familyrelation=9',
                }, {
                    name: 'Pembantu',
                    y: {{ $pembantu }},
                    website: 'dashboard/villagers?familyrelation=10',
                }, {
                    name: 'Lainnya',
                    y: {{ $lainnya }},
                    website: 'dashboard/villagers?familyrelation=11',
                }, ]
            }]
        });
    </script>
@endsection
