<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (!Schema::hasTable('domain_renewals')) {
            Schema::create('domain_renewals', function (Blueprint $table) {
                $table->id();
                $table->string('domain_name');
                $table->string('provider'); // Rumahweb, IDwebhost, Spaceship, Porkbun, GoDaddy, Webnesia, etc.
                $table->string('service_type')->default('domain'); // domain, hosting, vps, combo, ssl
                $table->date('registration_date')->nullable();
                $table->date('expiry_date');
                $table->decimal('renewal_price', 15, 2)->default(0);
                $table->string('currency', 10)->default('IDR');
                $table->string('billing_cycle')->default('yearly'); // monthly, yearly, 2_years, 3_years
                $table->boolean('auto_renew')->default(false);
                $table->text('nameservers')->nullable();
                $table->string('client_name')->nullable();
                $table->string('client_whatsapp')->nullable();
                $table->string('login_url')->nullable();
                $table->string('status')->default('active'); // active, expiring_soon, expired, transferred
                $table->text('notes')->nullable();
                $table->unsignedBigInteger('created_by')->nullable();
                $table->timestamps();

                $table->index('expiry_date');
                $table->index('provider');
                $table->index('service_type');
                $table->index('status');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('domain_renewals');
    }
};
