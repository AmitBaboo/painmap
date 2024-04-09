<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateUsersViewTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("CREATE OR REPLACE VIEW users_vw AS
        SELECT
            u.id AS id,
            u.first_name AS first_name,
            u.last_name AS last_name,
            u.contact_number AS contact_number,
            u.post_code AS post_code,
            u.email AS email,
            u.email_verified_at AS email_verified_at,
            u.password AS password,
            u.two_factor_secret AS two_factor_secret,
            u.two_factor_recovery_codes AS two_factor_recovery_codes,
            u.remember_token AS remember_token,
            u.current_team_id AS current_team_id,
            u.profile_photo_path AS profile_photo_path,
            u.status AS status,
            u.account_type AS account_type,
            u.created_by AS created_by,
            u.created_at AS created_at,
            u.updated_by AS updated_by,
            u.updated_at AS updated_at,
            (CASE
                WHEN (u.status = 0) THEN 'Registerd'
                WHEN (u.status = 1) then 'Inactive'
                WHEN (u.status = 2) then 'Active'
                ELSE 'Deleted'
            END) AS status_name
        FROM
            users u
        ORDER BY
            u.id");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users_view');
    }
}
