<?php
/**
 * Created by PhpStorm.
 * User: valeron
 * Date: 19.03.20
 * Time: 22:02
 */

namespace App\Proposals\Repositories;

use App\Proposal;
use Illuminate\Database\QueryException;


class ProposalRepository
{

    /**
     * ProposalRepository constructor.
     * @param Proposal $proposal
     */
    public function __construct(Proposal $proposal)
    {
        $this->model = $proposal;
    }

    /**
     * @param array $data
     * @return Proposal
     * @throws \Exception
     */
    public function createProposal(array $data) : Proposal
    {
        try {
            return $this->model->create($data);
        } catch (QueryException $e) {
            throw new QueryException($e);
        }
    }
}