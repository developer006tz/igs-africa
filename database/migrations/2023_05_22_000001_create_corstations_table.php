<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('corstations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('pnum');
            $table
                ->enum('stntype', ['GPS', 'GLONASS ', 'Galileo', 'BeiDou'])
                ->default('GPS');
            $table
                ->enum('stnstatus', ['installed', 'not-installed'])
                ->default('installed');
            $table
                ->enum('opstatus', ['Operable', 'Non-Operational'])
                ->default('Operable');
            $table->string('sitecity')->nullable();
            $table->string('sitestate')->nullable();
            $table
                ->string('region')
                ->default('noUS')
                ->nullable();
            $table->decimal('latitude', 10, 7);
            $table->decimal('longitude', 10, 7);
            $table->double('elevation', 10)->nullable();
            $table
                ->enum('project', ['PI', 'GNN', 'other'])
                ->default('PI')
                ->nullable();
            $table
                ->enum('network', ['PI', 'GGN', 'other'])
                ->default('PI')
                ->nullable();
            $table
                ->enum('multi_types', [
                    'GPS',
                    'GPS+GLO+GAL+BDS',
                    'GPS+GLO+GAL+BDS+IRSS',
                    'GPS+GLO',
                    'GPS+GLO+GAL+BDS+IRNS+SBAS',
                    'GPS+GLO+GAL+BDS+QZSS',
                    'DBS',
                    'IRSS',
                    'GLO',
                    'SBAS',
                    'GAL',
                ])
                ->default('GPS')
                ->nullable();
            $table->integer('is_realtime')->nullable();
            $table->integer('mean_latency_last_hour')->nullable();
            $table->integer('mean_latency_last_day')->nullable();
            $table->integer('data_complete_last_hour')->nullable();
            $table->integer('data_complete_last_day')->nullable();
            $table
                ->enum('status', [
                    'ok',
                    'unavilable',
                    'non-operational',
                    'failed',
                    'other',
                ])
                ->default('ok')
                ->nullable();
            $table->date('date_installed')->nullable();
            $table->year('last_rinex_data_year')->nullable();
            $table->string('data_download_link')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('corstations');
    }
};
