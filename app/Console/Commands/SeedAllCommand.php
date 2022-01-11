<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Log;
use App\Events\SchemaLoadedEvent;

class SeedAllCommand extends Command
{
	/**
	 * The name and signature of the console command.
	 *
	 * @var string
	 */
	protected $signature = 'seed:all';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = "ISeed Command to generate seeds for all tables";

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * Execute the console command.
	 *
	 * @return int
	 */
	public function handle()
	{
		$this->newLine();
		$this->newLine();
		$this->newLine();
		$this->info("Starting Seeder Generation Now!");
		$this->newLine();


		$this->line('     ---- migrations table will not be generated!');
		$this->line('     ---- password_resets will not be generated!');
		$this->line('     ---- users will not be generated!');
		$this->line('     ---- permissions will not be generated!');
		$this->line('     ---- sessions will not be generated!');
		$this->line('     ---- cache will not be generated!');
		$this->newLine();
		$start = now();

		$tab = DB::select('SHOW TABLES');
 
	   // $this->output->progressStart(count($tab));

		// https://symfony.com/doc/current/components/console/helpers/progressbar.html
		// https://mattstauffer.com/blog/advanced-input-output-with-artisan-commands-tables-and-progress-bars-in-laravel-5.1/
		// https://stackoverflow.com/questions/37319676/using-a-progress-bar-while-seeding-a-database-in-laravel
		// $i = 0;
		// while ($i++ < 50) {
		foreach (DB::select('SHOW TABLES') as $value) {

			foreach ($value as $tableName) {

				if (!in_array($tableName, ['migrations','cache','sessions','password_resets','users','permissions','permission_role','audit_logs','telescope_entries','telescope_entries_tags','telescope_monitoring','expenses','expense_categories','achievements','comments','contracts','courses','expenses','incomes','infographics','lessons','licenses','paytypes','prices','qualifications','sessions','skus','tests','views','job_skills','my_customers','employment_types','test_answers','test_results','qa_messages','qa_topics','question_options','career_paytype','career_qualification','deliverables','dev_doc_types','dev_documents','dev_types','dev_visibilities','discussions','folders','income_categories','infographic_product','lesson_product','license_statuses','oauth_access_tokens','oauth_auth_codes','oauth_clients','oauth_refresh_tokens','oauth_personal_access_clients','password_resets','order_statuses','ping_url_list_post','ping_url_lists'])) {
					$loopstart = now();
					Artisan::call('iseed', [
						'tables' => $tableName,
						'--force' => true,
					]);
					// $singular = Str::singular($tableName);
					$model_name = Str::of($tableName)->studly();
					 // $this->output->progressAdvance();
					$took = $loopstart->diffInSeconds(now());
					
					$this->comment($model_name . '   TableSeeder - Created in ' . $took . ' seconds  ');
					Log::info($model_name . '   TableSeeder - Created in ' . $took . ' seconds  ');


				}

			}
		}
	// }


		// $this->output->progressFinish();

		$this->info('All Seeders Were Created!');
		$time = $start->diffInSeconds(now());
		$this->info("Processed in $time seconds");
		Log::info("All Seeders Were Created! It Took $time");

		flash()->overlay('Tables Seeded Successfully!', 'Backup Tables!')->success()->important();
		
		return "Seed files created.";
	}
}