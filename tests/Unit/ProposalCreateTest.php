<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Proposal;
use App\Proposals\Repositories\ProposalRepository;
use Faker\Factory as Faker;

class ProposalCreateTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     * @throws \Exception
     */
    public function testExample()
    {
        $faker = Faker::create();
        $data = [
            'name' => $faker->name,
            'subject' => $faker->text,
            'message' => $faker->text,
            'email' => $faker->email,
            'date_create_proposal' => $faker->date('Y-m-d'),
            'client_id' => $faker->numberBetween(),
            'url_file' => $faker->url
        ];
        var_dump($data);
        $proposalRepo = new ProposalRepository(new Proposal());
        $proposal = $proposalRepo->createProposal($data);

        $this->assertInstanceOf(Proposal::class, $proposal);
        $this->assertEquals($data['name'], $proposal->name);
        $this->assertEquals($data['subject'], $proposal->subject);
        $this->assertEquals($data['message'], $proposal->message);
        $this->assertEquals($data['email'], $proposal->email);
        $this->assertEquals($data['date_create_proposal'], $proposal->date_create_proposal);
        $this->assertEquals($data['client_id'], $proposal->client_id);
        $this->assertEquals($data['url_file'], $proposal->url_file);

    }
}
