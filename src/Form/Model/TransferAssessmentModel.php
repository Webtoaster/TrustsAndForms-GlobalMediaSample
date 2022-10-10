<?php

namespace App\Form\Model;

use App\Service\Options;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Context\ExecutionContextInterface;

class TransferAssessmentModel
{

    /**
     * @var ?string $userRole
     * @Assert\NotBlank(
     *     message="Please select one of the options which best describes your role.",
     *     normalizer="trim",
     *     allowNull=false,
     *     )
     * @Assert\Choice(
     *     choices=Options::VALID_ASSESSMENT_USER_ROLE,
     *     message="Please select one of the options which best describes your role.",
     *     multiple=false,
     *     min=1,
     *     max=1,
     *     minMessage="Please select one of the options which best describes your role.",
     *     maxMessage="Please select one of the options which best describes your role.",
     * )
     */
    private ?string $userRole;


    /**
     * @var ?string $userAction
     * @Assert\NotBlank(
     *     message="Please select one of the options which best describes what you want to do.",
     *     normalizer="trim",
     *     allowNull=false
     *     )
     * @Assert\Choice(
     *     choices=Options::VALID_ASSESSMENT_USER_ACTION,
     *     message="Please select one of the options which best describes what you want to do.",
     *     multiple=false,
     *     min=1,
     *     max=1,
     *     minMessage="Please select one of the options which best describes what you want to do.",
     *     maxMessage="Please select one of the options which best describes what you want to do.",
     * )
     */
    private ?string $userAction;

    /**
     * @return string
     */
    public function getUserRole(): string
    {
        return $this->userRole;
    }

    /**
     * @param string $userRole
     */
    public function setUserRole(string $userRole): void
    {
        $this->userRole = trim($userRole);
    }

    /**
     * @return string
     */
    public function getUserAction(): string
    {
        return $this->userAction;
    }

    /**
     * @param string $userAction
     */
    public function setUserAction(string $userAction): void
    {
        $this->userAction = trim($userAction);
    }


}