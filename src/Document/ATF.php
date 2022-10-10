<?php

namespace App\Document;

use App\Service\Options;
use DateTime;
use Doctrine\Bundle\MongoDBBundle\Validator\Constraints\Unique as MongoDBUnique;
use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @MongoDB\Document(
 *     collection="atfforms",
 *     repositoryClass="App\Repository\ATFForms",
 *     db="symfony")
 * @MongoDBUnique(
 *     fields={"id", "formId"}
 *     )
 * @MongoDB\HasLifecycleCallbacks
 */
class ATF
{

    /**
     * @MongoDB\Id
     */
    private int $id;

    /**
     * 1010
     * @MongoDB\Field(
     *     name="form_id",
     *     type="int",
     *     nullable=false)
     */
    private ?int $formId;

    /**
     * 1020
     * @MongoDB\Field(
     *     name="parent_form_id",
     *     type="int",
     *     nullable=true)
     */
    private ?int $parentFormId;

    /**
     * 1030
     * @MongoDB\Field(
     *     name="date_started",
     *     type="date",
     *     nullable=false)
     */
    private ?Datetime $dateStarted;

    /**
     * 1040
     * @MongoDB\Field(
     *     name="date_completed",
     *     type="date",
     *     nullable=true)
     */
    private ?Datetime $dateCompleted;

    /**
     * @MongoDB\Field(
     *     name="status",
     *     type="string",
     *     nullable=false)
     */
    private ?string $status;

    /**
     * 2000
     * @MongoDB\Field(
     *     name="form_name",
     *     type="string",
     *     nullable=false)
     */
    private ?string $formName;

    /**
     * 2010
     * @MongoDB\Field(
     *     name="omb_form_id",
     *     type="string",
     *     nullable=false)
     */
    private ?string $ombFormId;

    /**
     * 2020
     * @MongoDB\Field(
     *     name="type_form",
     *     type="string",
     *     nullable=true)
     */
    private ?string $typeForm;

    /**
     * 2030
     * @MongoDB\Field(
     *     name="type_application",
     *     type="string",
     *     nullable=true)
     */
    private ?string $typeApplication;

    /**
     * 2040
     * @MongoDB\Field(
     *     name="type_transfer",
     *     type="string",
     *     nullable=true)
     */
    private ?string $typeTransfer;

    /**
     * 2050
     * @MongoDB\Field(
     *     name="type_transferee",
     *     type="string",
     *     nullable=true)
     */
    private ?string $typeTransferee;

    /**
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
     * @MongoDB\Field(
     *     name="user_role",
     *     type="string",
     *     nullable=true)
     */
    private ?string $userRole;

    /**
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
     * @MongoDB\Field(
     *     name="user_action",
     *     type="string",
     *     nullable=true)
     */
    private ?string $userAction;

    /**
     * 3000
     * @Assert\NotNull(
     *     groups={"form1req"},
     *     message="This field cannot be empty (null).",
     * )
     * @Assert\NotBlank(
     *     groups={"form1req"},
     *     message="This field cannot be empty (blank).",
     * )
     * @Assert\Length(
     *     groups={"form1req"},
     *     max=37,
     *     maxMessage="The Maximum Length for this field on a Form 1 is {{ limit }} characters.")
     * @Assert\Regex(
     *     groups={"form1req"},
     *     normalizer="trim",
     *     pattern="^[a-z,A-Z,0-9,\s\'\-_#,*@]+$/si",
     *     match=false,
     *     message="May only contain common and alphanumeric characters.")
     * @MongoDB\Field(
     *     name="transferee_trade_name",
     *     type="string",
     *     nullable=true)
     */
    private ?string $transfereeTradeName;

    /**
     * 3010
     * @Assert\NotNull(
     *     groups={"form1req", "form4req", "form5req"},
     *     message="This field cannot be empty (null).",
     * )
     * @Assert\NotBlank(
     *     groups={"form1req", "form4req", "form5req"},
     *     message="This field cannot be empty (blank).",
     * )
     * @Assert\Length(
     *     groups={"form1req"},
     *     max=60,
     *     maxMessage="The Maximum Length for this field on a Form 1 is {{ limit }} characters.")
     * @Assert\Length(
     *     groups={"form4req"},
     *     max=60,
     *     maxMessage="The Maximum Length for this field on a Form 4 is {{ limit }} characters.")
     * @Assert\Length(
     *     groups={"form5req"},
     *     max=60,
     *     maxMessage="The Maximum Length for this field on a Form 5 is {{ limit }} characters.")
     * @Assert\Regex(
     *     groups={"form1req", "form4req", "form5req"},
     *     normalizer="trim",
     *     pattern="^[a-z,A-Z,0-9,\s\'\-_#,*@]+$/si",
     *     match=false,
     *     message="May only contain common and alphanumeric characters.")
     * @MongoDB\Field(
     *     name="transferee_name",
     *     type="string",
     *     nullable=true)
     */
    private ?string $transfereeName;


    /**
     * 3010
     * @Assert\NotNull(
     *     groups={"form1req", "form4req", "form5req"},
     *     message="This field cannot be empty (null).",
     * )
     * @Assert\NotBlank(
     *     groups={"form1req", "form4req", "form5req"},
     *     message="This field cannot be empty (blank).",
     * )
     * @Assert\Length(
     *     groups={"form1req"},
     *     max=60,
     *     maxMessage="The Maximum Length for this field on a Form 1 is {{ limit }} characters.")
     * @Assert\Length(
     *     groups={"form4req"},
     *     max=60,
     *     maxMessage="The Maximum Length for this field on a Form 4 is {{ limit }} characters.")
     * @Assert\Length(
     *     groups={"form5req"},
     *     max=60,
     *     maxMessage="The Maximum Length for this field on a Form 5 is {{ limit }} characters.")
     * @Assert\Regex(
     *     groups={"form1req", "form4req", "form5req"},
     *     normalizer="trim",
     *     pattern="^[a-z,A-Z,0-9,\s\'\-_#,*@]+$/si",
     *     match=false,
     *     message="May only contain common and alphanumeric characters.")
     * @MongoDB\Field(
     *     name="applicant_name",
     *     type="string",
     *     nullable=true)
     */
    private ?string $applicantName;

    public function getApplicantName(): ?string
    {
        return $this->applicantName;
    }

    public function setApplicantName(?string $applicantName): void
    {
        $this->applicantName = $applicantName;
    }




    /**
     * 3012
     * @Assert\NotNull(
     *     groups={"form1req"},
     *     message="This field cannot be empty (null).",
     * )
     * @Assert\NotBlank(
     *     groups={"form1req"},
     *     message="This field cannot be empty (blank).",
     * )
     * @Assert\Regex(
     *     groups={"form1req"},
     *     normalizer="trim",
     *     pattern="^[a-z,A-Z,0-9,\s\\'\-_#,*@]+$/si",
     *     match=false,
     *     message="May only contain common and alphanumeric characters.")
     * @MongoDB\Field(
     *     name="applicant_title",
     *     type="string",
     *     nullable=true)
     */
    private ?string $applicantTitle;

    /**
     * 3060
     * @Assert\NotNull(
     *     groups={"form1req", "form4req", "form5req", "formRPreq"},
     *     message="This field cannot be empty (null).",
     * )
     * @Assert\NotBlank(
     *     groups={"form1req", "form4req", "form5req", "formRPreq"},
     *     message="This field cannot be empty (blank).",
     * )
     * @Assert\Length(
     *     groups={"form1req"},
     *     max=60,
     *     maxMessage="The Maximum Length for this field on a Form 1 is {{ limit }} characters.")
     * @Assert\Length(
     *     groups={"form4req"},
     *     max=60,
     *     maxMessage="The Maximum Length for this field on a Form 4 is {{ limit }} characters.")
     * @Assert\Length(
     *     groups={"form5req"},
     *     max=60,
     *     maxMessage="The Maximum Length for this field on a Form 5 is {{ limit }} characters.")
     * @Assert\Length(
     *     groups={"formRPreq"},
     *     max=60,
     *     maxMessage="The Maximum Length for this field on the Responsible Person Question is {{ limit }} characters.")
     * @Assert\Regex(
     *     groups={"form1req", "form4req", "form5req", "formRPreq"},
     *     normalizer="trim",
     *     pattern="^[a-z,A-Z,0-9,\s\\'\-_#,*@]+$/si",
     *     match=false,
     *     message="May only contain common and alphanumeric characters.")
     * @MongoDB\Field(
     *     name="transferee_line1",
     *     type="string",
     *     nullable=true)
     */
    private ?string $transfereeLine1;

    /**
     * 3070
     * @Assert\NotNull(
     *     groups={"form1req", "form4req", "form5req", "formRPreq"},
     *     message="This field cannot be empty (null).",
     * )
     * @Assert\NotBlank(
     *     groups={"form1req", "form4req", "form5req", "formRPreq"},
     *     message="This field cannot be empty (blank).",
     * )
     * @Assert\Length(
     *     groups={"form1req"},
     *     max=60,
     *     maxMessage="The Maximum Length for this field on a Form 1 is {{ limit }} characters.")
     * @Assert\Length(
     *     groups={"form4req"},
     *     max=60,
     *     maxMessage="The Maximum Length for this field on a Form 4 is {{ limit }} characters.")
     * @Assert\Length(
     *     groups={"form5req"},
     *     max=60,
     *     maxMessage="The Maximum Length for this field on a Form 5 is {{ limit }} characters.")
     * @Assert\Length(
     *     groups={"formRPreq"},
     *     max=60,
     *     maxMessage="The Maximum Length for this field on the Responsible Person Question is {{ limit }} characters.")
     * @Assert\Regex(
     *     groups={"form1req", "form4req", "form5req", "formRPreq"},
     *     normalizer="trim",
     *     pattern="^[a-z,A-Z,0-9,\s\\'\-_#,*@]+$/si",
     *     match=false,
     *     message="May only contain common and alphanumeric characters.")
     * @MongoDB\Field(
     *     name="transferee_line2",
     *     type="string",
     *     nullable=true)
     */
    private ?string $transfereeLine2;

    /**
     * 3080
     * @Assert\NotNull(
     *     groups={"form1req", "form4req", "form5req", "formRPreq"},
     *     message="This field cannot be empty (null).",
     * )
     * @Assert\NotBlank(
     *     groups={"form1req", "form4req", "form5req", "formRPreq"},
     *     message="This field cannot be empty (blank).",
     * )
     * @Assert\Length(
     *     groups={"form1req"},
     *     max=44,
     *     maxMessage="The Maximum Length for this field on a Form 1 is {{ limit }} characters.")
     * @Assert\Length(
     *     groups={"form4req"},
     *     max=44,
     *     maxMessage="The Maximum Length for this field on a Form 4 is {{ limit }} characters.")
     * @Assert\Length(
     *     groups={"form5req"},
     *     max=44,
     *     maxMessage="The Maximum Length for this field on a Form 5 is {{ limit }} characters.")
     * @Assert\Length(
     *     groups={"formRPreq"},
     *     max=44,
     *     maxMessage="The Maximum Length for this field on the Responsible Person Question is {{ limit }} characters.")
     * @Assert\Regex(
     *     groups={"form1req", "form4req", "form5req", "formRPreq"},
     *     normalizer="trim",
     *     pattern="^[a-z,A-Z,0-9,\s\\'\-_#,*@]+$/si",
     *     match=false,
     *     message="May only contain common and alphanumeric characters.")
     * @MongoDB\Field(
     *     name="transferee_city",
     *     type="string",
     *     nullable=true)
     */
    private ?string $transfereeCity;

    /**
     * 3090
     * @Assert\NotNull(
     *     groups={"form1req", "form4req", "form5req", "formRPreq"},
     *     message="This field cannot be empty (null).",
     * )
     * @Assert\NotBlank(
     *     groups={"form1req", "form4req", "form5req", "formRPreq"},
     *     message="This field cannot be empty (blank).",
     * )
     * @Assert\Length(
     *     groups={"form1req"},
     *     max=2,
     *     maxMessage="The Maximum Length for this field on a Form 1 is {{ limit }} characters.")
     * @Assert\Length(
     *     groups={"form4req"},
     *     max=2,
     *     maxMessage="The Maximum Length for this field on a Form 4 is {{ limit }} characters.")
     * @Assert\Length(
     *     groups={"form5req"},
     *     max=2,
     *     maxMessage="The Maximum Length for this field on a Form 5 is {{ limit }} characters.")
     * @Assert\Length(
     *     groups={"formRPreq"},
     *     max=2,
     *     maxMessage="The Maximum Length for this field on the Responsible Person Question is {{ limit }} characters.")
     * @Assert\Regex(
     *     groups={"form1req", "form4req", "form5req", "formRPreq"},
     *     normalizer="trim",
     *     pattern="^[a-z,A-Z,0-9,\s\\'\-_#,*@]+$/si",
     *     match=false,
     *     message="May only contain common and alphanumeric characters.")
     * @MongoDB\Field(
     *     name="transferee_state",
     *     type="string",
     *     nullable=true)
     */
    private ?string $transfereeState;

    /**
     * 3100
     * @Assert\NotNull(
     *     groups={"form1req", "form4req", "form5req", "formRPreq"},
     *     message="This field cannot be empty (null).",
     * )
     * @Assert\NotBlank(
     *     groups={"form1req", "form4req", "form5req", "formRPreq"},
     *     message="This field cannot be empty (blank).",
     * )
     * @Assert\Length(
     *     groups={"form1req"},
     *     max=10,
     *     maxMessage="The Maximum Length for this field on a Form 1 is {{ limit }} characters.")
     * @Assert\Length(
     *     groups={"form4req"},
     *     max=10,
     *     maxMessage="The Maximum Length for this field on a Form 4 is {{ limit }} characters.")
     * @Assert\Length(
     *     groups={"form5req"},
     *     max=10,
     *     maxMessage="The Maximum Length for this field on a Form 5 is {{ limit }} characters.")
     * @Assert\Length(
     *     groups={"formRPreq"},
     *     max=10,
     *     maxMessage="The Maximum Length for this field on the Responsible Person Question is {{ limit }} characters.")
     * @Assert\Regex(
     *     groups={"form1req", "form4req", "form5req", "formRPreq"},
     *     normalizer="trim",
     *     pattern="^[a-z,A-Z,0-9,\s\\'\-_#,*@]+$/si",
     *     match=false,
     *     message="May only contain common and alphanumeric characters.")
     * @MongoDB\Field(
     *     name="transferee_zipcode",
     *     type="string",
     *     nullable=true)
     */
    private ?string $transfereeZipcode;

    /**
     * 3110
     * @Assert\NotNull(
     *     groups={"form1req", "form4req", "form5req"},
     *     message="This field cannot be empty (null).",
     * )
     * @Assert\NotBlank(
     *     groups={"form1req", "form4req", "form5req"},
     *     message="This field cannot be empty (blank).",
     * )
     * @Assert\Length(
     *     groups={"form1req"},
     *     max=30,
     *     maxMessage="The Maximum Length for this field on a Form 1 is {{ limit }} characters.")
     * @Assert\Length(
     *     groups={"form4req"},
     *     max=26,
     *     maxMessage="The Maximum Length for this field on a Form 4 is {{ limit }} characters.")
     * @Assert\Length(
     *     groups={"form5req"},
     *     max=26,
     *     maxMessage="The Maximum Length for this field on a Form 5 is {{ limit }} characters.")
     * @Assert\Regex(
     *     groups={"form1req", "form4req", "form5req"},
     *     normalizer="trim",
     *     pattern="^[a-z,A-Z,0-9,\s\\'\-_#,*@]+$/si",
     *     match=false,
     *     message="May only contain common and alphanumeric characters.")
     * @MongoDB\Field(
     *     name="transferee_county",
     *     type="string",
     *     nullable=true)
     */
    private ?string $transfereeCounty;

    /**
     * 3120
     * @Assert\NotNull(
     *     groups={"form1req"},
     *     message="This field cannot be empty (null).",
     * )
     * @Assert\NotBlank(
     *     groups={"form1req"},
     *     message="This field cannot be empty (blank).",
     * )
     * @Assert\Length(
     *     groups={"form1req"},
     *     max=31,
     *     maxMessage="The Maximum Length for this field on a Form 1 is {{ limit }} characters.")
     * @Assert\Regex(
     *     groups={"form1req"},
     *     normalizer="trim",
     *     pattern="^[a-z,A-Z,0-9,\s\\'\-_#,*@]+$/si",
     *     match=false,
     *     message="May only contain common and alphanumeric characters.")
     * @MongoDB\Field(
     *     name="transferee_email",
     *     type="string",
     *     nullable=true)
     */
    private ?string $transfereeEmail;

    /**
     * 3130
     * @Assert\NotNull(
     *     groups={"form1req"},
     *     message="This field cannot be empty (null).",
     * )
     * @Assert\NotBlank(
     *     groups={"form1req"},
     *     message="This field cannot be empty (blank).",
     * )
     * @Assert\Length(
     *     groups={"form1req"},
     *     max=30,
     *     maxMessage="The Maximum Length for this field on a Form 1 is {{ limit }} characters.")
     * @Assert\Regex(
     *     groups={"form1req"},
     *     normalizer="trim",
     *     pattern="^[a-z,A-Z,0-9,\s\\'\-_#,*@]+$/si",
     *     match=false,
     *     message="May only contain common and alphanumeric characters.")
     * @MongoDB\Field(
     *     name="transferee_phone",
     *     type="string",
     *     nullable=true)
     */
    private ?string $transfereePhone;

    /**
     * 3140
     * @Assert\NotNull(
     *     groups={"form1req", "form4req", "form5req"},
     *     message="This field cannot be empty (null).",
     * )
     * @Assert\NotBlank(
     *     groups={"form1req", "form4req", "form5req"},
     *     message="This field cannot be empty (blank).",
     * )
     * @Assert\Length(
     *     groups={"form1req"},
     *     max=10,
     *     maxMessage="The Maximum Length for this field on a Form 1 is {{ limit }} characters.")
     * @Assert\Length(
     *     groups={"form4req"},
     *     max=10,
     *     maxMessage="The Maximum Length for this field on a Form 4 is {{ limit }} characters.")
     * @Assert\Length(
     *     groups={"form5req"},
     *     max=10,
     *     maxMessage="The Maximum Length for this field on a Form 5 is {{ limit }} characters.")
     * @Assert\Regex(
     *     groups={"form1req", "form4req", "form5req"},
     *     normalizer="trim",
     *     pattern="^[a-z,A-Z,0-9,\s\\'\-_#,*@]+$/si",
     *     match=false,
     *     message="May only contain common and alphanumeric characters.")
     * @MongoDB\Field(
     *     name="transferee_date_signed",
     *     type="date",
     *     nullable=true)
     */
    private ?Datetime $transfereeDateSigned;

    /**
     * 3150
     * @Assert\NotNull(
     *     groups={"form1req", "form4req", "form5req"},
     *     message="This field cannot be empty (null).",
     * )
     * @Assert\NotBlank(
     *     groups={"form1req", "form4req", "form5req"},
     *     message="This field cannot be empty (blank).",
     * )
     * @Assert\Length(
     *     groups={"form1req"},
     *     max=6,
     *     maxMessage="The Maximum Length for this field on a Form 1 is {{ limit }} characters.")
     * @Assert\Length(
     *     groups={"form4req"},
     *     max=6,
     *     maxMessage="The Maximum Length for this field on a Form 4 is {{ limit }} characters.")
     * @Assert\Length(
     *     groups={"form5req"},
     *     max=6,
     *     maxMessage="The Maximum Length for this field on a Form 5 is {{ limit }} characters.")
     * @Assert\Regex(
     *     groups={"form1req", "form4req", "form5req"},
     *     normalizer="trim",
     *     pattern="^[a-z,A-Z,0-9,\s\\'\-_#,*@]+$/si",
     *     match=false,
     *     message="May only contain common and alphanumeric characters.")
     * @MongoDB\Field(
     *     name="transferee_ffl_1",
     *     type="string",
     *     nullable=true)
     */
    private ?string $transfereeFfl1;

    /**
     * 3160
     * @Assert\NotNull(
     *     groups={"form1req", "form4req", "form5req"},
     *     message="This field cannot be empty (null).",
     * )
     * @Assert\NotBlank(
     *     groups={"form1req", "form4req", "form5req"},
     *     message="This field cannot be empty (blank).",
     * )
     * @Assert\Length(
     *     groups={"form1req"},
     *     max=2,
     *     maxMessage="The Maximum Length for this field on a Form 1 is {{ limit }} characters.")
     * @Assert\Length(
     *     groups={"form4req"},
     *     max=2,
     *     maxMessage="The Maximum Length for this field on a Form 4 is {{ limit }} characters.")
     * @Assert\Length(
     *     groups={"form5req"},
     *     max=2,
     *     maxMessage="The Maximum Length for this field on a Form 5 is {{ limit }} characters.")
     * @Assert\Regex(
     *     groups={"form1req", "form4req", "form5req"},
     *     normalizer="trim",
     *     pattern="^[a-z,A-Z,0-9,\s\\'\-_#,*@]+$/si",
     *     match=false,
     *     message="May only contain common and alphanumeric characters.")
     * @MongoDB\Field(
     *     name="transferee_ffl_2",
     *     type="string",
     *     nullable=true)
     */
    private ?string $transfereeFfl2;

    /**
     * 3170
     * @Assert\NotNull(
     *     groups={"form1req", "form4req", "form5req"},
     *     message="This field cannot be empty (null).",
     * )
     * @Assert\NotBlank(
     *     groups={"form1req", "form4req", "form5req"},
     *     message="This field cannot be empty (blank).",
     * )
     * @Assert\Length(
     *     groups={"form1req"},
     *     max=2,
     *     maxMessage="The Maximum Length for this field on a Form 1 is {{ limit }} characters.")
     * @Assert\Length(
     *     groups={"form4req"},
     *     max=2,
     *     maxMessage="The Maximum Length for this field on a Form 4 is {{ limit }} characters.")
     * @Assert\Length(
     *     groups={"form5req"},
     *     max=2,
     *     maxMessage="The Maximum Length for this field on a Form 5 is {{ limit }} characters.")
     * @Assert\Regex(
     *     groups={"form1req", "form4req", "form5req"},
     *     normalizer="trim",
     *     pattern="^[a-z,A-Z,0-9,\s\\'\-_#,*@]+$/si",
     *     match=false,
     *     message="May only contain common and alphanumeric characters.")
     * @MongoDB\Field(
     *     name="transferee_ffl_3",
     *     type="string",
     *     nullable=true)
     */
    private ?string $transfereeFfl3;

    /**
     * 3180
     * @Assert\NotNull(
     *     groups={"form1req", "form4req", "form5req"},
     *     message="This field cannot be empty (null).",
     * )
     * @Assert\NotBlank(
     *     groups={"form1req", "form4req", "form5req"},
     *     message="This field cannot be empty (blank).",
     * )
     * @Assert\Length(
     *     groups={"form1req"},
     *     max=5,
     *     maxMessage="The Maximum Length for this field on a Form 1 is {{ limit }} characters.")
     * @Assert\Length(
     *     groups={"form4req"},
     *     max=5,
     *     maxMessage="The Maximum Length for this field on a Form 4 is {{ limit }} characters.")
     * @Assert\Length(
     *     groups={"form5req"},
     *     max=5,
     *     maxMessage="The Maximum Length for this field on a Form 5 is {{ limit }} characters.")
     * @Assert\Regex(
     *     groups={"form1req", "form4req", "form5req"},
     *     normalizer="trim",
     *     pattern="^[a-z,A-Z,0-9,\s\\'\-_#,*@]+$/si",
     *     match=false,
     *     message="May only contain common and alphanumeric characters.")
     * @MongoDB\Field(
     *     name="transferee_ffl_4",
     *     type="string",
     *     nullable=true)
     */
    private ?string $transfereeFfl4;

    /**
     * 3190
     * @Assert\NotNull(
     *     groups={"form1req", "form4req", "form5req"},
     *     message="This field cannot be empty (null).",
     * )
     * @Assert\NotBlank(
     *     groups={"form1req", "form4req", "form5req"},
     *     message="This field cannot be empty (blank).",
     * )
     * @Assert\Length(
     *     groups={"form1req"},
     *     max=34,
     *     maxMessage="The Maximum Length for this field on a Form 1 is {{ limit }} characters.")
     * @Assert\Length(
     *     groups={"form4req"},
     *     max=34,
     *     maxMessage="The Maximum Length for this field on a Form 4 is {{ limit }} characters.")
     * @Assert\Length(
     *     groups={"form5req"},
     *     max=34,
     *     maxMessage="The Maximum Length for this field on a Form 5 is {{ limit }} characters.")
     * @Assert\Regex(
     *     groups={"form1req", "form4req", "form5req"},
     *     normalizer="trim",
     *     pattern="^[a-z,A-Z,0-9,\s\\'\-_#,*@]+$/si",
     *     match=false,
     *     message="May only contain common and alphanumeric characters.")
     * @MongoDB\Field(
     *     name="transferee_ein",
     *     type="string",
     *     nullable=true)
     */
    private ?string $transfereeEin;

    /**
     * 3200
     * @Assert\NotNull(
     *     groups={"form1req", "form4req", "form5req"},
     *     message="This field cannot be empty (null).",
     * )
     * @Assert\NotBlank(
     *     groups={"form1req", "form4req", "form5req"},
     *     message="This field cannot be empty (blank).",
     * )
     * @Assert\Length(
     *     groups={"form1req"},
     *     max=34,
     *     maxMessage="The Maximum Length for this field on a Form 1 is {{ limit }} characters.")
     * @Assert\Length(
     *     groups={"form4req"},
     *     max=34,
     *     maxMessage="The Maximum Length for this field on a Form 4 is {{ limit }} characters.")
     * @Assert\Length(
     *     groups={"form5req"},
     *     max=34,
     *     maxMessage="The Maximum Length for this field on a Form 5 is {{ limit }} characters.")
     * @Assert\Regex(
     *     groups={"form1req", "form4req", "form5req"},
     *     normalizer="trim",
     *     pattern="^[a-z,A-Z,0-9,\s\\'\-_#,*@]+$/si",
     *     match=false,
     *     message="May only contain common and alphanumeric characters.")
     * @MongoDB\Field(
     *     name="transferee_class",
     *     type="string",
     *     nullable=true)
     */
    private ?string $transfereeClass;

    /**
     * 4000
     * @Assert\NotNull(
     *     groups={"form1req", "form4req", "form5req"},
     *     message="This field cannot be empty (null).",
     * )
     * @Assert\NotBlank(
     *     groups={"form1req", "form4req", "form5req"},
     *     message="This field cannot be empty (blank).",
     * )
     * @Assert\Length(
     *     groups={"form1req"},
     *     max=1,
     *     maxMessage="The Maximum Length for this field on a Form 1 is {{ limit }} characters.")
     * @Assert\Length(
     *     groups={"form4req"},
     *     max=1,
     *     maxMessage="The Maximum Length for this field on a Form 4 is {{ limit }} characters.")
     * @Assert\Length(
     *     groups={"form5req"},
     *     max=1,
     *     maxMessage="The Maximum Length for this field on a Form 5 is {{ limit }} characters.")
     * @Assert\Regex(
     *     groups={"form1req", "form4req", "form5req"},
     *     normalizer="trim",
     *     pattern="^[a-z,A-Z,0-9,\s\\'\-_#,*@]+$/si",
     *     match=false,
     *     message="May only contain common and alphanumeric characters.")
     * @MongoDB\Field(
     *     name="rp_quantity",
     *     type="int",
     *     nullable=true)
     */
    private ?int $rpQuantity;

    /**
     * 4010
     * @Assert\NotNull(
     *     groups={"form1req", "form4req", "form5req"},
     *     message="This field cannot be empty (null).",
     * )
     * @Assert\NotBlank(
     *     groups={"form1req", "form4req", "form5req"},
     *     message="This field cannot be empty (blank).",
     * )
     * @Assert\Length(
     *     groups={"form1req"},
     *     max=64,
     *     maxMessage="The Maximum Length for this field on a Form 1 is {{ limit }} characters.")
     * @Assert\Length(
     *     groups={"form4req"},
     *     max=64,
     *     maxMessage="The Maximum Length for this field on a Form 4 is {{ limit }} characters.")
     * @Assert\Length(
     *     groups={"form5req"},
     *     max=64,
     *     maxMessage="The Maximum Length for this field on a Form 5 is {{ limit }} characters.")
     * @Assert\Regex(
     *     groups={"form1req", "form4req", "form5req"},
     *     normalizer="trim",
     *     pattern="^[a-z,A-Z,0-9,\s\\'\-_#,*@]+$/si",
     *     match=false,
     *     message="May only contain common and alphanumeric characters.")
     * @MongoDB\Field(
     *     name="rp_name_1",
     *     type="string",
     *     nullable=true)
     */
    private ?string $rpName1;

    /**
     * 4020
     * @Assert\NotNull(
     *     groups={"form1req", "form4req", "form5req"},
     *     message="This field cannot be empty (null).",
     * )
     * @Assert\NotBlank(
     *     groups={"form1req", "form4req", "form5req"},
     *     message="This field cannot be empty (blank).",
     * )
     * @Assert\Length(
     *     groups={"form1req"},
     *     max=128,
     *     maxMessage="The Maximum Length for this field on a Form 1 is {{ limit }} characters.")
     * @Assert\Length(
     *     groups={"form4req"},
     *     max=128,
     *     maxMessage="The Maximum Length for this field on a Form 4 is {{ limit }} characters.")
     * @Assert\Length(
     *     groups={"form5req"},
     *     max=128,
     *     maxMessage="The Maximum Length for this field on a Form 5 is {{ limit }} characters.")
     * @Assert\Regex(
     *     groups={"form1req", "form4req", "form5req"},
     *     normalizer="trim",
     *     pattern="^[a-z,A-Z,0-9,\s\\'\-_#,*@]+$/si",
     *     match=false,
     *     message="May only contain common and alphanumeric characters.")
     * @MongoDB\Field(
     *     name="rp_email_1",
     *     type="string",
     *     nullable=true)
     */
    private ?string $rpEmail1;

    /**
     * 4030
     * @Assert\NotNull(
     *     groups={"form1req", "form4req", "form5req"},
     *     message="This field cannot be empty (null).",
     * )
     * @Assert\NotBlank(
     *     groups={"form1req", "form4req", "form5req"},
     *     message="This field cannot be empty (blank).",
     * )
     * @Assert\Length(
     *     groups={"form1req"},
     *     max=64,
     *     maxMessage="The Maximum Length for this field on a Form 1 is {{ limit }} characters.")
     * @Assert\Length(
     *     groups={"form4req"},
     *     max=64,
     *     maxMessage="The Maximum Length for this field on a Form 4 is {{ limit }} characters.")
     * @Assert\Length(
     *     groups={"form5req"},
     *     max=64,
     *     maxMessage="The Maximum Length for this field on a Form 5 is {{ limit }} characters.")
     * @Assert\Regex(
     *     groups={"form1req", "form4req", "form5req"},
     *     normalizer="trim",
     *     pattern="^[a-z,A-Z,0-9,\s\\'\-_#,*@]+$/si",
     *     match=false,
     *     message="May only contain common and alphanumeric characters.")
     * @MongoDB\Field(
     *     name="rp_name_2",
     *     type="string",
     *     nullable=true)
     */
    private ?string $rpName2;

    /**
     * 4040
     * @Assert\NotNull(
     *     groups={"form1req", "form4req", "form5req"},
     *     message="This field cannot be empty (null).",
     * )
     * @Assert\NotBlank(
     *     groups={"form1req", "form4req", "form5req"},
     *     message="This field cannot be empty (blank).",
     * )
     * @Assert\Length(
     *     groups={"form1req"},
     *     max=128,
     *     maxMessage="The Maximum Length for this field on a Form 1 is {{ limit }} characters.")
     * @Assert\Length(
     *     groups={"form4req"},
     *     max=128,
     *     maxMessage="The Maximum Length for this field on a Form 4 is {{ limit }} characters.")
     * @Assert\Length(
     *     groups={"form5req"},
     *     max=128,
     *     maxMessage="The Maximum Length for this field on a Form 5 is {{ limit }} characters.")
     * @Assert\Regex(
     *     groups={"form1req", "form4req", "form5req"},
     *     normalizer="trim",
     *     pattern="^[a-z,A-Z,0-9,\s\\'\-_#,*@]+$/si",
     *     match=false,
     *     message="May only contain common and alphanumeric characters.")
     * @MongoDB\Field(
     *     name="rp_email_2",
     *     type="string",
     *     nullable=true)
     */
    private ?string $rpEmail2;

    /**
     * 4050
     * @Assert\NotNull(
     *     groups={"form1req", "form4req", "form5req"},
     *     message="This field cannot be empty (null).",
     * )
     * @Assert\NotBlank(
     *     groups={"form1req", "form4req", "form5req"},
     *     message="This field cannot be empty (blank).",
     * )
     * @Assert\Length(
     *     groups={"form1req"},
     *     max=64,
     *     maxMessage="The Maximum Length for this field on a Form 1 is {{ limit }} characters.")
     * @Assert\Length(
     *     groups={"form4req"},
     *     max=64,
     *     maxMessage="The Maximum Length for this field on a Form 4 is {{ limit }} characters.")
     * @Assert\Length(
     *     groups={"form5req"},
     *     max=64,
     *     maxMessage="The Maximum Length for this field on a Form 5 is {{ limit }} characters.")
     * @Assert\Regex(
     *     groups={"form1req", "form4req", "form5req"},
     *     normalizer="trim",
     *     pattern="^[a-z,A-Z,0-9,\s\\'\-_#,*@]+$/si",
     *     match=false,
     *     message="May only contain common and alphanumeric characters.")
     * @MongoDB\Field(
     *     name="rp_name_3",
     *     type="string",
     *     nullable=true)
     */
    private ?string $rpName3;

    /**
     * 4060
     * @Assert\NotNull(
     *     groups={"form1req", "form4req", "form5req"},
     *     message="This field cannot be empty (null).",
     * )
     * @Assert\NotBlank(
     *     groups={"form1req", "form4req", "form5req"},
     *     message="This field cannot be empty (blank).",
     * )
     * @Assert\Length(
     *     groups={"form1req"},
     *     max=128,
     *     maxMessage="The Maximum Length for this field on a Form 1 is {{ limit }} characters.")
     * @Assert\Length(
     *     groups={"form4req"},
     *     max=128,
     *     maxMessage="The Maximum Length for this field on a Form 4 is {{ limit }} characters.")
     * @Assert\Length(
     *     groups={"form5req"},
     *     max=128,
     *     maxMessage="The Maximum Length for this field on a Form 5 is {{ limit }} characters.")
     * @Assert\Regex(
     *     groups={"form1req", "form4req", "form5req"},
     *     normalizer="trim",
     *     pattern="^[a-z,A-Z,0-9,\s\\'\-_#,*@]+$/si",
     *     match=false,
     *     message="May only contain common and alphanumeric characters.")
     * @MongoDB\Field(
     *     name="rp_email_3",
     *     type="string",
     *     nullable=true)
     */
    private ?string $rpEmail3;

    /**
     * 4070
     * @Assert\NotNull(
     *     groups={"form1req", "form4req", "form5req"},
     *     message="This field cannot be empty (null).",
     * )
     * @Assert\NotBlank(
     *     groups={"form1req", "form4req", "form5req"},
     *     message="This field cannot be empty (blank).",
     * )
     * @Assert\Length(
     *     groups={"form1req"},
     *     max=64,
     *     maxMessage="The Maximum Length for this field on a Form 1 is {{ limit }} characters.")
     * @Assert\Length(
     *     groups={"form4req"},
     *     max=64,
     *     maxMessage="The Maximum Length for this field on a Form 4 is {{ limit }} characters.")
     * @Assert\Length(
     *     groups={"form5req"},
     *     max=64,
     *     maxMessage="The Maximum Length for this field on a Form 5 is {{ limit }} characters.")
     * @Assert\Regex(
     *     groups={"form1req", "form4req", "form5req"},
     *     normalizer="trim",
     *     pattern="^[a-z,A-Z,0-9,\s\\'\-_#,*@]+$/si",
     *     match=false,
     *     message="May only contain common and alphanumeric characters.")
     * @MongoDB\Field(
     *     name="rp_name_4",
     *     type="string",
     *     nullable=true)
     */
    private ?string $rpName4;

    /**
     * 4080
     * @Assert\NotNull(
     *     groups={"form1req", "form4req", "form5req"},
     *     message="This field cannot be empty (null).",
     * )
     * @Assert\NotBlank(
     *     groups={"form1req", "form4req", "form5req"},
     *     message="This field cannot be empty (blank).",
     * )
     * @Assert\Length(
     *     groups={"form1req"},
     *     max=128,
     *     maxMessage="The Maximum Length for this field on a Form 1 is {{ limit }} characters.")
     * @Assert\Length(
     *     groups={"form4req"},
     *     max=128,
     *     maxMessage="The Maximum Length for this field on a Form 4 is {{ limit }} characters.")
     * @Assert\Length(
     *     groups={"form5req"},
     *     max=128,
     *     maxMessage="The Maximum Length for this field on a Form 5 is {{ limit }} characters.")
     * @Assert\Regex(
     *     groups={"form1req", "form4req", "form5req"},
     *     normalizer="trim",
     *     pattern="^[a-z,A-Z,0-9,\s\\'\-_#,*@]+$/si",
     *     match=false,
     *     message="May only contain common and alphanumeric characters.")
     * @MongoDB\Field(
     *     name="rp_email_4",
     *     type="string",
     *     nullable=true)
     */
    private ?string $rpEmail4;

    /**
     * 4090
     * @Assert\NotNull(
     *     groups={"form1req", "form4req", "form5req"},
     *     message="This field cannot be empty (null).",
     * )
     * @Assert\NotBlank(
     *     groups={"form1req", "form4req", "form5req"},
     *     message="This field cannot be empty (blank).",
     * )
     * @Assert\Length(
     *     groups={"form1req"},
     *     max=64,
     *     maxMessage="The Maximum Length for this field on a Form 1 is {{ limit }} characters.")
     * @Assert\Length(
     *     groups={"form4req"},
     *     max=64,
     *     maxMessage="The Maximum Length for this field on a Form 4 is {{ limit }} characters.")
     * @Assert\Length(
     *     groups={"form5req"},
     *     max=64,
     *     maxMessage="The Maximum Length for this field on a Form 5 is {{ limit }} characters.")
     * @Assert\Regex(
     *     groups={"form1req", "form4req", "form5req"},
     *     normalizer="trim",
     *     pattern="^[a-z,A-Z,0-9,\s\\'\-_#,*@]+$/si",
     *     match=false,
     *     message="May only contain common and alphanumeric characters.")
     * @MongoDB\Field(
     *     name="rp_name_5",
     *     type="string",
     *     nullable=true)
     */
    private ?string $rpName5;

    /**
     * 4100
     * @Assert\NotNull(
     *     groups={"form1req", "form4req", "form5req"},
     *     message="This field cannot be empty (null).",
     * )
     * @Assert\NotBlank(
     *     groups={"form1req", "form4req", "form5req"},
     *     message="This field cannot be empty (blank).",
     * )
     * @Assert\Length(
     *     groups={"form1req"},
     *     max=128,
     *     maxMessage="The Maximum Length for this field on a Form 1 is {{ limit }} characters.")
     * @Assert\Length(
     *     groups={"form4req"},
     *     max=128,
     *     maxMessage="The Maximum Length for this field on a Form 4 is {{ limit }} characters.")
     * @Assert\Length(
     *     groups={"form5req"},
     *     max=128,
     *     maxMessage="The Maximum Length for this field on a Form 5 is {{ limit }} characters.")
     * @Assert\Regex(
     *     groups={"form1req", "form4req", "form5req"},
     *     normalizer="trim",
     *     pattern="^[a-z,A-Z,0-9,\s\\'\-_#,*@]+$/si",
     *     match=false,
     *     message="May only contain common and alphanumeric characters.")
     * @MongoDB\Field(
     *     name="rp_email_5",
     *     type="string",
     *     nullable=true)
     */
    private ?string $rpEmail5;

    /**
     * 4110
     * @Assert\NotNull(
     *     groups={"form1req", "form4req", "form5req"},
     *     message="This field cannot be empty (null).",
     * )
     * @Assert\NotBlank(
     *     groups={"form1req", "form4req", "form5req"},
     *     message="This field cannot be empty (blank).",
     * )
     * @Assert\Length(
     *     groups={"form1req"},
     *     max=64,
     *     maxMessage="The Maximum Length for this field on a Form 1 is {{ limit }} characters.")
     * @Assert\Length(
     *     groups={"form4req"},
     *     max=64,
     *     maxMessage="The Maximum Length for this field on a Form 4 is {{ limit }} characters.")
     * @Assert\Length(
     *     groups={"form5req"},
     *     max=64,
     *     maxMessage="The Maximum Length for this field on a Form 5 is {{ limit }} characters.")
     * @Assert\Regex(
     *     groups={"form1req", "form4req", "form5req"},
     *     normalizer="trim",
     *     pattern="^[a-z,A-Z,0-9,\s\\'\-_#,*@]+$/si",
     *     match=false,
     *     message="May only contain common and alphanumeric characters.")
     * @MongoDB\Field(
     *     name="rp_name_6",
     *     type="string",
     *     nullable=true)
     */
    private ?string $rpName6;

    /**
     * 4120
     * @Assert\NotNull(
     *     groups={"form1req", "form4req", "form5req"},
     *     message="This field cannot be empty (null).",
     * )
     * @Assert\NotBlank(
     *     groups={"form1req", "form4req", "form5req"},
     *     message="This field cannot be empty (blank).",
     * )
     * @Assert\Length(
     *     groups={"form1req"},
     *     max=128,
     *     maxMessage="The Maximum Length for this field on a Form 1 is {{ limit }} characters.")
     * @Assert\Length(
     *     groups={"form4req"},
     *     max=128,
     *     maxMessage="The Maximum Length for this field on a Form 4 is {{ limit }} characters.")
     * @Assert\Length(
     *     groups={"form5req"},
     *     max=128,
     *     maxMessage="The Maximum Length for this field on a Form 5 is {{ limit }} characters.")
     * @Assert\Regex(
     *     groups={"form1req", "form4req", "form5req"},
     *     normalizer="trim",
     *     pattern="^[a-z,A-Z,0-9,\s\\'\-_#,*@]+$/si",
     *     match=false,
     *     message="May only contain common and alphanumeric characters.")
     * @MongoDB\Field(
     *     name="rp_email_6",
     *     type="string",
     *     nullable=true)
     */
    private ?string $rpEmail6;

    /**
     * 4130
     * @Assert\NotNull(
     *     groups={"form4req"},
     *     message="This field cannot be empty (null).",
     * )
     * @Assert\NotBlank(
     *     groups={"form4req"},
     *     message="This field cannot be empty (blank).",
     * )
     * @Assert\Length(
     *     groups={"form4req"},
     *     max=64,
     *     maxMessage="The Maximum Length for this field on a Form 4 is {{ limit }} characters.")
     * @Assert\Regex(
     *     groups={"form4req"},
     *     normalizer="trim",
     *     pattern="^[a-z,A-Z,0-9,\s\\'\-_#,*@]+$/si",
     *     match=false,
     *     message="May only contain common and alphanumeric characters.")
     * @MongoDB\Field(
     *     name="rp_name_7",
     *     type="string",
     *     nullable=true)
     */
    private ?string $rpName7;

    /**
     * 4140
     * @Assert\NotNull(
     *     groups={"form4req"},
     *     message="This field cannot be empty (null).",
     * )
     * @Assert\NotBlank(
     *     groups={"form4req"},
     *     message="This field cannot be empty (blank).",
     * )
     * @Assert\Length(
     *     groups={"form4req"},
     *     max=128,
     *     maxMessage="The Maximum Length for this field on a Form 4 is {{ limit }} characters.")
     * @Assert\Regex(
     *     groups={"form4req"},
     *     normalizer="trim",
     *     pattern="^[a-z,A-Z,0-9,\s\\'\-_#,*@]+$/si",
     *     match=false,
     *     message="May only contain common and alphanumeric characters.")
     * @MongoDB\Field(
     *     name="rp_email_7",
     *     type="string",
     *     nullable=true)
     */
    private ?string $rpEmail7;

    /**
     * 4150
     * @Assert\NotNull(
     *     groups={"form4req"},
     *     message="This field cannot be empty (null).",
     * )
     * @Assert\NotBlank(
     *     groups={"form4req"},
     *     message="This field cannot be empty (blank).",
     * )
     * @Assert\Length(
     *     groups={"form4req"},
     *     max=64,
     *     maxMessage="The Maximum Length for this field on a Form 4 is {{ limit }} characters.")
     * @Assert\Regex(
     *     groups={"form4req"},
     *     normalizer="trim",
     *     pattern="^[a-z,A-Z,0-9,\s\\'\-_#,*@]+$/si",
     *     match=false,
     *     message="May only contain common and alphanumeric characters.")
     * @MongoDB\Field(
     *     name="rp_name_8",
     *     type="string",
     *     nullable=true)
     */
    private ?string $rpName8;

    /**
     * 4160
     * @Assert\NotNull(
     *     groups={"form4req"},
     *     message="This field cannot be empty (null).",
     * )
     * @Assert\NotBlank(
     *     groups={"form4req"},
     *     message="This field cannot be empty (blank).",
     * )
     * @Assert\Length(
     *     groups={"form4req"},
     *     max=128,
     *     maxMessage="The Maximum Length for this field on a Form 4 is {{ limit }} characters.")
     * @Assert\Regex(
     *     groups={"form4req"},
     *     normalizer="trim",
     *     pattern="^[a-z,A-Z,0-9,\s\\'\-_#,*@]+$/si",
     *     match=false,
     *     message="May only contain common and alphanumeric characters.")
     * @MongoDB\Field(
     *     name="rp_email_8",
     *     type="string",
     *     nullable=true)
     */
    private ?string $rpEmail8;

    /**
     * 4170
     * @Assert\NotNull(
     *     groups={"formRPreq"},
     *     message="This field cannot be empty (null).",
     * )
     * @Assert\NotBlank(
     *     groups={"formRPreq"},
     *     message="This field cannot be empty (blank).",
     * )
     * @Assert\Length(
     *     groups={"formRPreq"},
     *     max=70,
     *     maxMessage="The Maximum Length for this field on the Responsible Person Question is {{ limit }} characters.")
     * @Assert\Regex(
     *     groups={"formRPreq"},
     *     normalizer="trim",
     *     pattern="^[a-z,A-Z,0-9,\s\\'\-_#,*@]+$/si",
     *     match=false,
     *     message="May only contain common and alphanumeric characters.")
     * @MongoDB\Field(
     *     name="rp_name",
     *     type="string",
     *     nullable=true)
     */
    private ?string $rpName;

    /**
     * 4210
     * @Assert\NotNull(
     *     groups={"formRPreq"},
     *     message="This field cannot be empty (null).",
     * )
     * @Assert\NotBlank(
     *     groups={"formRPreq"},
     *     message="This field cannot be empty (blank).",
     * )
     * @Assert\Length(
     *     groups={"formRPreq"},
     *     max=70,
     *     maxMessage="The Maximum Length for this field on the Responsible Person Question is {{ limit }} characters.")
     * @Assert\Regex(
     *     groups={"formRPreq"},
     *     normalizer="trim",
     *     pattern="^[a-z,A-Z,0-9,\s\\'\-_#,*@]+$/si",
     *     match=false,
     *     message="May only contain common and alphanumeric characters.")
     * @MongoDB\Field(
     *     name="rp_line1",
     *     type="string",
     *     nullable=true)
     */
    private ?string $rpLine1;

    /**
     * 4220
     * @Assert\NotNull(
     *     groups={"formRPreq"},
     *     message="This field cannot be empty (null).",
     * )
     * @Assert\NotBlank(
     *     groups={"formRPreq"},
     *     message="This field cannot be empty (blank).",
     * )
     * @Assert\Length(
     *     groups={"formRPreq"},
     *     max=70,
     *     maxMessage="The Maximum Length for this field on the Responsible Person Question is {{ limit }} characters.")
     * @Assert\Regex(
     *     groups={"formRPreq"},
     *     normalizer="trim",
     *     pattern="^[a-z,A-Z,0-9,\s\\'\-_#,*@]+$/si",
     *     match=false,
     *     message="May only contain common and alphanumeric characters.")
     * @MongoDB\Field(
     *     name="rp_line2",
     *     type="string",
     *     nullable=true)
     */
    private ?string $rpLine2;

    /**
     * 4230
     * @Assert\NotNull(
     *     groups={"formRPreq"},
     *     message="This field cannot be empty (null).",
     * )
     * @Assert\NotBlank(
     *     groups={"formRPreq"},
     *     message="This field cannot be empty (blank).",
     * )
     * @Assert\Length(
     *     groups={"formRPreq"},
     *     max=65,
     *     maxMessage="The Maximum Length for this field on the Responsible Person Question is {{ limit }} characters.")
     * @Assert\Regex(
     *     groups={"formRPreq"},
     *     normalizer="trim",
     *     pattern="^[a-z,A-Z,0-9,\s\\'\-_#,*@]+$/si",
     *     match=false,
     *     message="May only contain common and alphanumeric characters.")
     * @MongoDB\Field(
     *     name="rp_city",
     *     type="string",
     *     nullable=true)
     */
    private ?string $rpCity;

    /**
     * 4240
     * @Assert\NotNull(
     *     groups={"formRPreq"},
     *     message="This field cannot be empty (null).",
     * )
     * @Assert\NotBlank(
     *     groups={"formRPreq"},
     *     message="This field cannot be empty (blank).",
     * )
     * @Assert\Length(
     *     groups={"formRPreq"},
     *     max=2,
     *     maxMessage="The Maximum Length for this field on the Responsible Person Question is {{ limit }} characters.")
     * @Assert\Regex(
     *     groups={"formRPreq"},
     *     normalizer="trim",
     *     pattern="^[a-z,A-Z,0-9,\s\\'\-_#,*@]+$/si",
     *     match=false,
     *     message="May only contain common and alphanumeric characters.")
     * @MongoDB\Field(
     *     name="rp_state",
     *     type="string",
     *     nullable=true)
     */
    private ?string $rpState;

    /**
     * 4250
     * @Assert\NotNull(
     *     groups={"formRPreq"},
     *     message="This field cannot be empty (null).",
     * )
     * @Assert\NotBlank(
     *     groups={"formRPreq"},
     *     message="This field cannot be empty (blank).",
     * )
     * @Assert\Length(
     *     groups={"formRPreq"},
     *     max=10,
     *     maxMessage="The Maximum Length for this field on the Responsible Person Question is {{ limit }} characters.")
     * @Assert\Regex(
     *     groups={"formRPreq"},
     *     normalizer="trim",
     *     pattern="^[a-z,A-Z,0-9,\s\\'\-_#,*@]+$/si",
     *     match=false,
     *     message="May only contain common and alphanumeric characters.")
     * @MongoDB\Field(
     *     name="rp_zipcode",
     *     type="string",
     *     nullable=true)
     */
    private ?string $rpZipcode;

    /**
     * 4260
     * @Assert\NotNull(
     *     groups={"formRPreq"},
     *     message="This field cannot be empty (null).",
     * )
     * @Assert\NotBlank(
     *     groups={"formRPreq"},
     *     message="This field cannot be empty (blank).",
     * )
     * @Assert\Length(
     *     groups={"formRPreq"},
     *     max=65,
     *     maxMessage="The Maximum Length for this field on the Responsible Person Question is {{ limit }} characters.")
     * @Assert\Regex(
     *     groups={"formRPreq"},
     *     normalizer="trim",
     *     pattern="^[a-z,A-Z,0-9,\s\\'\-_#,*@]+$/si",
     *     match=false,
     *     message="May only contain common and alphanumeric characters.")
     * @MongoDB\Field(
     *     name="rp_email",
     *     type="string",
     *     nullable=true)
     */
    private ?string $rpEmail;

    /**
     * 4270
     * @Assert\NotNull(
     *     groups={"formRPreq"},
     *     message="This field cannot be empty (null).",
     * )
     * @Assert\NotBlank(
     *     groups={"formRPreq"},
     *     message="This field cannot be empty (blank).",
     * )
     * @Assert\Length(
     *     groups={"formRPreq"},
     *     max=65,
     *     maxMessage="The Maximum Length for this field on the Responsible Person Question is {{ limit }} characters.")
     * @Assert\Regex(
     *     groups={"formRPreq"},
     *     normalizer="trim",
     *     pattern="^[a-z,A-Z,0-9,\s\\'\-_#,*@]+$/si",
     *     match=false,
     *     message="May only contain common and alphanumeric characters.")
     * @MongoDB\Field(
     *     name="rp_phone",
     *     type="string",
     *     nullable=true)
     */
    private ?string $rpPhone;

    /**
     * 4280
     * @Assert\NotNull(
     *     groups={"formRPreq"},
     *     message="This field cannot be empty (null).",
     * )
     * @Assert\NotBlank(
     *     groups={"formRPreq"},
     *     message="This field cannot be empty (blank).",
     * )
     * @Assert\Length(
     *     groups={"formRPreq"},
     *     max=134,
     *     maxMessage="The Maximum Length for this field on the Responsible Person Question is {{ limit }} characters.")
     * @Assert\Regex(
     *     groups={"formRPreq"},
     *     normalizer="trim",
     *     pattern="^[a-z,A-Z,0-9,\s\\'\-_#,*@]+$/si",
     *     match=false,
     *     message="May only contain common and alphanumeric characters.")
     * @MongoDB\Field(
     *     name="rp_alias",
     *     type="string",
     *     nullable=true)
     */
    private ?string $rpAlias;

    /**
     * 5010
     * @Assert\NotNull(
     *     groups={"form4req", "form5req"},
     *     message="This field cannot be empty (null).",
     * )
     * @Assert\NotBlank(
     *     groups={"form4req", "form5req"},
     *     message="This field cannot be empty (blank).",
     * )
     * @Assert\Length(
     *     groups={"form4req"},
     *     max=148,
     *     maxMessage="The Maximum Length for this field on a Form 4 is {{ limit }} characters.")
     * @Assert\Length(
     *     groups={"form5req"},
     *     max=198,
     *     maxMessage="The Maximum Length for this field on a Form 5 is {{ limit }} characters.")
     * @Assert\Regex(
     *     groups={"form4req", "form5req"},
     *     normalizer="trim",
     *     pattern="^[a-z,A-Z,0-9,\s\\'\-_#,*@]+$/si",
     *     match=false,
     *     message="May only contain common and alphanumeric characters.")
     * @MongoDB\Field(
     *     name="decedent_details",
     *     type="string",
     *     nullable=true)
     */
    private ?string $decedentDetails;

    /**
     * 6040
     * @Assert\NotNull(
     *     groups={"form4req", "form5req"},
     *     message="This field cannot be empty (null).",
     * )
     * @Assert\NotBlank(
     *     groups={"form4req", "form5req"},
     *     message="This field cannot be empty (blank).",
     * )
     * @Assert\Length(
     *     groups={"form4req"},
     *     max=60,
     *     maxMessage="The Maximum Length for this field on a Form 4 is {{ limit }} characters.")
     * @Assert\Length(
     *     groups={"form5req"},
     *     max=60,
     *     maxMessage="The Maximum Length for this field on a Form 5 is {{ limit }} characters.")
     * @Assert\Regex(
     *     groups={"form4req", "form5req"},
     *     normalizer="trim",
     *     pattern="^[a-z,A-Z,0-9,\s\\'\-_#,*@]+$/si",
     *     match=false,
     *     message="May only contain common and alphanumeric characters.")
     * @MongoDB\Field(
     *     name="transferor_name",
     *     type="string",
     *     nullable=true)
     */
    private ?string $transferorName;

    /**
     * 6040
     * @Assert\NotNull(
     *     groups={"form4req", "form5req"},
     *     message="This field cannot be empty (null).",
     * )
     * @Assert\NotBlank(
     *     groups={"form4req", "form5req"},
     *     message="This field cannot be empty (blank).",
     * )
     * @Assert\Length(
     *     groups={"form4req"},
     *     max=60,
     *     maxMessage="The Maximum Length for this field on a Form 4 is {{ limit }} characters.")
     * @Assert\Length(
     *     groups={"form5req"},
     *     max=60,
     *     maxMessage="The Maximum Length for this field on a Form 5 is {{ limit }} characters.")
     * @Assert\Regex(
     *     groups={"form4req", "form5req"},
     *     normalizer="trim",
     *     pattern="^[a-z,A-Z,0-9,\s\\'\-_#,*@]+$/si",
     *     match=false,
     *     message="May only contain common and alphanumeric characters.")
     * @MongoDB\Field(
     *     name="transferor_representative",
     *     type="string",
     *     nullable=true)
     */
    private ?string $transferorRepresentative;

    public function getTransferorRepresentative(): ?string
    {
        return $this->transferorRepresentative;
    }

    public function setTransferorRepresentative(?string $transferorRepresentative): void
    {
        $this->transferorRepresentative = $transferorRepresentative;
    }




    /**
     * 6042
     * @Assert\NotNull(
     *     groups={"form4req", "form5req"},
     *     message="This field cannot be empty (null).",
     * )
     * @Assert\NotBlank(
     *     groups={"form4req", "form5req"},
     *     message="This field cannot be empty (blank).",
     * )
     * @Assert\Length(
     *     groups={"form4req"},
     *     max=47,
     *     maxMessage="The Maximum Length for this field on a Form 4 is {{ limit }} characters.")
     * @Assert\Length(
     *     groups={"form5req"},
     *     max=48,
     *     maxMessage="The Maximum Length for this field on a Form 5 is {{ limit }} characters.")
     * @Assert\Regex(
     *     groups={"form4req", "form5req"},
     *     normalizer="trim",
     *     pattern="^[a-z,A-Z,0-9,\s\\'\-_#,*@]+$/si",
     *     match=false,
     *     message="May only contain common and alphanumeric characters.")
     * @MongoDB\Field(
     *     name="transferor_name_and_title",
     *     type="string",
     *     nullable=true)
     */
    private ?string $transferorNameAndTitle;

    /**
     * 6042
     * @Assert\NotNull(
     *     groups={"form4req", "form5req"},
     *     message="This field cannot be empty (null).",
     * )
     * @Assert\NotBlank(
     *     groups={"form4req", "form5req"},
     *     message="This field cannot be empty (blank).",
     * )
     * @Assert\Length(
     *     groups={"form4req"},
     *     max=47,
     *     maxMessage="The Maximum Length for this field on a Form 4 is {{ limit }} characters.")
     * @Assert\Length(
     *     groups={"form5req"},
     *     max=48,
     *     maxMessage="The Maximum Length for this field on a Form 5 is {{ limit }} characters.")
     * @Assert\Regex(
     *     groups={"form4req", "form5req"},
     *     normalizer="trim",
     *     pattern="^[a-z,A-Z,0-9,\s\\'\-_#,*@]+$/si",
     *     match=false,
     *     message="May only contain common and alphanumeric characters.")
     * @MongoDB\Field(
     *     name="transferor_title",
     *     type="string",
     *     nullable=true)
     */
    private ?string $transferorTitle;

    /**
     * 6060
     * @Assert\NotNull(
     *     groups={"form4req", "form5req"},
     *     message="This field cannot be empty (null).",
     * )
     * @Assert\NotBlank(
     *     groups={"form4req", "form5req"},
     *     message="This field cannot be empty (blank).",
     * )
     * @Assert\Length(
     *     groups={"form4req"},
     *     max=60,
     *     maxMessage="The Maximum Length for this field on a Form 4 is {{ limit }} characters.")
     * @Assert\Length(
     *     groups={"form5req"},
     *     max=60,
     *     maxMessage="The Maximum Length for this field on a Form 5 is {{ limit }} characters.")
     * @Assert\Regex(
     *     groups={"form4req", "form5req"},
     *     normalizer="trim",
     *     pattern="^[a-z,A-Z,0-9,\s\\'\-_#,*@]+$/si",
     *     match=false,
     *     message="May only contain common and alphanumeric characters.")
     * @MongoDB\Field(
     *     name="transferor_line1",
     *     type="string",
     *     nullable=true)
     */
    private ?string $transferorLine1;

    /**
     * 6070
     * @Assert\NotNull(
     *     groups={"form4req", "form5req"},
     *     message="This field cannot be empty (null).",
     * )
     * @Assert\NotBlank(
     *     groups={"form4req", "form5req"},
     *     message="This field cannot be empty (blank).",
     * )
     * @Assert\Length(
     *     groups={"form4req"},
     *     max=60,
     *     maxMessage="The Maximum Length for this field on a Form 4 is {{ limit }} characters.")
     * @Assert\Length(
     *     groups={"form5req"},
     *     max=60,
     *     maxMessage="The Maximum Length for this field on a Form 5 is {{ limit }} characters.")
     * @Assert\Regex(
     *     groups={"form4req", "form5req"},
     *     normalizer="trim",
     *     pattern="^[a-z,A-Z,0-9,\s\\'\-_#,*@]+$/si",
     *     match=false,
     *     message="May only contain common and alphanumeric characters.")
     * @MongoDB\Field(
     *     name="transferor_line2",
     *     type="string",
     *     nullable=true)
     */
    private ?string $transferorLine2;

    /**
     * 6080
     * @Assert\NotNull(
     *     groups={"form4req", "form5req"},
     *     message="This field cannot be empty (null).",
     * )
     * @Assert\NotBlank(
     *     groups={"form4req", "form5req"},
     *     message="This field cannot be empty (blank).",
     * )
     * @Assert\Length(
     *     groups={"form4req"},
     *     max=44,
     *     maxMessage="The Maximum Length for this field on a Form 4 is {{ limit }} characters.")
     * @Assert\Length(
     *     groups={"form5req"},
     *     max=44,
     *     maxMessage="The Maximum Length for this field on a Form 5 is {{ limit }} characters.")
     * @Assert\Regex(
     *     groups={"form4req", "form5req"},
     *     normalizer="trim",
     *     pattern="^[a-z,A-Z,0-9,\s\\'\-_#,*@]+$/si",
     *     match=false,
     *     message="May only contain common and alphanumeric characters.")
     * @MongoDB\Field(
     *     name="transferor_city",
     *     type="string",
     *     nullable=true)
     */
    private ?string $transferorCity;

    /**
     * 6090
     * @Assert\NotNull(
     *     groups={"form4req", "form5req"},
     *     message="This field cannot be empty (null).",
     * )
     * @Assert\NotBlank(
     *     groups={"form4req", "form5req"},
     *     message="This field cannot be empty (blank).",
     * )
     * @Assert\Length(
     *     groups={"form4req"},
     *     max=2,
     *     maxMessage="The Maximum Length for this field on a Form 4 is {{ limit }} characters.")
     * @Assert\Length(
     *     groups={"form5req"},
     *     max=2,
     *     maxMessage="The Maximum Length for this field on a Form 5 is {{ limit }} characters.")
     * @Assert\Regex(
     *     groups={"form4req", "form5req"},
     *     normalizer="trim",
     *     pattern="^[a-z,A-Z,0-9,\s\\'\-_#,*@]+$/si",
     *     match=false,
     *     message="May only contain common and alphanumeric characters.")
     * @MongoDB\Field(
     *     name="transferor_state",
     *     type="string",
     *     nullable=true)
     */
    private ?string $transferorState;

    /**
     * 6100
     * @Assert\NotNull(
     *     groups={"form4req", "form5req"},
     *     message="This field cannot be empty (null).",
     * )
     * @Assert\NotBlank(
     *     groups={"form4req", "form5req"},
     *     message="This field cannot be empty (blank).",
     * )
     * @Assert\Length(
     *     groups={"form4req"},
     *     max=10,
     *     maxMessage="The Maximum Length for this field on a Form 4 is {{ limit }} characters.")
     * @Assert\Length(
     *     groups={"form5req"},
     *     max=10,
     *     maxMessage="The Maximum Length for this field on a Form 5 is {{ limit }} characters.")
     * @Assert\Regex(
     *     groups={"form4req", "form5req"},
     *     normalizer="trim",
     *     pattern="^[a-z,A-Z,0-9,\s\\'\-_#,*@]+$/si",
     *     match=false,
     *     message="May only contain common and alphanumeric characters.")
     * @MongoDB\Field(
     *     name="transferor_zipcode",
     *     type="string",
     *     nullable=true)
     */
    private ?string $transferorZipcode;

    /**
     * 6120
     * @Assert\NotNull(
     *     groups={"form4req", "form5req"},
     *     message="This field cannot be empty (null).",
     * )
     * @Assert\NotBlank(
     *     groups={"form4req", "form5req"},
     *     message="This field cannot be empty (blank).",
     * )
     * @Assert\Length(
     *     groups={"form4req"},
     *     max=32,
     *     maxMessage="The Maximum Length for this field on a Form 4 is {{ limit }} characters.")
     * @Assert\Length(
     *     groups={"form5req"},
     *     max=25,
     *     maxMessage="The Maximum Length for this field on a Form 5 is {{ limit }} characters.")
     * @Assert\Regex(
     *     groups={"form4req", "form5req"},
     *     normalizer="trim",
     *     pattern="^[a-z,A-Z,0-9,\s\\'\-_#,*@]+$/si",
     *     match=false,
     *     message="May only contain common and alphanumeric characters.")
     * @MongoDB\Field(
     *     name="transferor_email",
     *     type="string",
     *     nullable=true)
     */
    private ?string $transferorEmail;

    /**
     * 6130
     * @Assert\NotNull(
     *     groups={"form4req", "form5req"},
     *     message="This field cannot be empty (null).",
     * )
     * @Assert\NotBlank(
     *     groups={"form4req", "form5req"},
     *     message="This field cannot be empty (blank).",
     * )
     * @Assert\Length(
     *     groups={"form4req"},
     *     max=40,
     *     maxMessage="The Maximum Length for this field on a Form 4 is {{ limit }} characters.")
     * @Assert\Length(
     *     groups={"form5req"},
     *     max=36,
     *     maxMessage="The Maximum Length for this field on a Form 5 is {{ limit }} characters.")
     * @Assert\Regex(
     *     groups={"form4req", "form5req"},
     *     normalizer="trim",
     *     pattern="^[a-z,A-Z,0-9,\s\\'\-_#,*@]+$/si",
     *     match=false,
     *     message="May only contain common and alphanumeric characters.")
     * @MongoDB\Field(
     *     name="transferor_phone",
     *     type="string",
     *     nullable=true)
     */
    private ?string $transferorPhone;

    /**
     * 6140
     * @Assert\NotNull(
     *     groups={"form4req", "form5req"},
     *     message="This field cannot be empty (null).",
     * )
     * @Assert\NotBlank(
     *     groups={"form4req", "form5req"},
     *     message="This field cannot be empty (blank).",
     * )
     * @Assert\Regex(
     *     groups={"form4req", "form5req"},
     *     normalizer="trim",
     *     pattern="^[a-z,A-Z,0-9,\s\\'\-_#,*@]+$/si",
     *     match=false,
     *     message="May only contain common and alphanumeric characters.")
     * @MongoDB\Field(
     *     name="transferor_date_signed",
     *     type="date",
     *     nullable=true)
     */
    private ?Datetime $transferorDateSigned;

    /**
     * 6150
     * @Assert\NotNull(
     *     groups={"form4req", "form5req"},
     *     message="This field cannot be empty (null).",
     * )
     * @Assert\NotBlank(
     *     groups={"form4req", "form5req"},
     *     message="This field cannot be empty (blank).",
     * )
     * @Assert\Length(
     *     groups={"form4req"},
     *     max=6,
     *     maxMessage="The Maximum Length for this field on a Form 4 is {{ limit }} characters.")
     * @Assert\Length(
     *     groups={"form5req"},
     *     max=6,
     *     maxMessage="The Maximum Length for this field on a Form 5 is {{ limit }} characters.")
     * @Assert\Regex(
     *     groups={"form4req", "form5req"},
     *     normalizer="trim",
     *     pattern="^[a-z,A-Z,0-9,\s\\'\-_#,*@]+$/si",
     *     match=false,
     *     message="May only contain common and alphanumeric characters.")
     * @MongoDB\Field(
     *     name="transferor_ffl_1",
     *     type="string",
     *     nullable=true)
     */
    private ?string $transferorFfl1;

    /**
     * 6160
     * @Assert\NotNull(
     *     groups={"form4req", "form5req"},
     *     message="This field cannot be empty (null).",
     * )
     * @Assert\NotBlank(
     *     groups={"form4req", "form5req"},
     *     message="This field cannot be empty (blank).",
     * )
     * @Assert\Length(
     *     groups={"form4req"},
     *     max=2,
     *     maxMessage="The Maximum Length for this field on a Form 4 is {{ limit }} characters.")
     * @Assert\Length(
     *     groups={"form5req"},
     *     max=2,
     *     maxMessage="The Maximum Length for this field on a Form 5 is {{ limit }} characters.")
     * @Assert\Regex(
     *     groups={"form4req", "form5req"},
     *     normalizer="trim",
     *     pattern="^[a-z,A-Z,0-9,\s\\'\-_#,*@]+$/si",
     *     match=false,
     *     message="May only contain common and alphanumeric characters.")
     * @MongoDB\Field(
     *     name="transferor_ffl_2",
     *     type="string",
     *     nullable=true)
     */
    private ?string $transferorFfl2;

    /**
     * 6170
     * @Assert\NotNull(
     *     groups={"form4req", "form5req"},
     *     message="This field cannot be empty (null).",
     * )
     * @Assert\NotBlank(
     *     groups={"form4req", "form5req"},
     *     message="This field cannot be empty (blank).",
     * )
     * @Assert\Length(
     *     groups={"form4req"},
     *     max=2,
     *     maxMessage="The Maximum Length for this field on a Form 4 is {{ limit }} characters.")
     * @Assert\Length(
     *     groups={"form5req"},
     *     max=2,
     *     maxMessage="The Maximum Length for this field on a Form 5 is {{ limit }} characters.")
     * @Assert\Regex(
     *     groups={"form4req", "form5req"},
     *     normalizer="trim",
     *     pattern="^[a-z,A-Z,0-9,\s\\'\-_#,*@]+$/si",
     *     match=false,
     *     message="May only contain common and alphanumeric characters.")
     * @MongoDB\Field(
     *     name="transferor_ffl_3",
     *     type="string",
     *     nullable=true)
     */
    private ?string $transferorFfl3;

    /**
     * 6180
     * @Assert\NotNull(
     *     groups={"form4req", "form5req"},
     *     message="This field cannot be empty (null).",
     * )
     * @Assert\NotBlank(
     *     groups={"form4req", "form5req"},
     *     message="This field cannot be empty (blank).",
     * )
     * @Assert\Length(
     *     groups={"form4req"},
     *     max=5,
     *     maxMessage="The Maximum Length for this field on a Form 4 is {{ limit }} characters.")
     * @Assert\Length(
     *     groups={"form5req"},
     *     max=5,
     *     maxMessage="The Maximum Length for this field on a Form 5 is {{ limit }} characters.")
     * @Assert\Regex(
     *     groups={"form4req", "form5req"},
     *     normalizer="trim",
     *     pattern="^[a-z,A-Z,0-9,\s\\'\-_#,*@]+$/si",
     *     match=false,
     *     message="May only contain common and alphanumeric characters.")
     * @MongoDB\Field(
     *     name="transferor_ffl_4",
     *     type="string",
     *     nullable=true)
     */
    private ?string $transferorFfl4;

    /**
     * 6190
     * @Assert\NotNull(
     *     groups={"form4req", "form5req"},
     *     message="This field cannot be empty (null).",
     * )
     * @Assert\NotBlank(
     *     groups={"form4req", "form5req"},
     *     message="This field cannot be empty (blank).",
     * )
     * @Assert\Length(
     *     groups={"form4req"},
     *     max=34,
     *     maxMessage="The Maximum Length for this field on a Form 4 is {{ limit }} characters.")
     * @Assert\Length(
     *     groups={"form5req"},
     *     max=34,
     *     maxMessage="The Maximum Length for this field on a Form 5 is {{ limit }} characters.")
     * @Assert\Regex(
     *     groups={"form4req", "form5req"},
     *     normalizer="trim",
     *     pattern="^[a-z,A-Z,0-9,\s\\'\-_#,*@]+$/si",
     *     match=false,
     *     message="May only contain common and alphanumeric characters.")
     * @MongoDB\Field(
     *     name="transferor_ein",
     *     type="string",
     *     nullable=true)
     */
    private ?string $transferorEin;

    /**
     * 6200
     * @Assert\NotNull(
     *     groups={"form4req", "form5req"},
     *     message="This field cannot be empty (null).",
     * )
     * @Assert\NotBlank(
     *     groups={"form4req", "form5req"},
     *     message="This field cannot be empty (blank).",
     * )
     * @Assert\Length(
     *     groups={"form4req"},
     *     max=34,
     *     maxMessage="The Maximum Length for this field on a Form 4 is {{ limit }} characters.")
     * @Assert\Length(
     *     groups={"form5req"},
     *     max=34,
     *     maxMessage="The Maximum Length for this field on a Form 5 is {{ limit }} characters.")
     * @Assert\Regex(
     *     groups={"form4req", "form5req"},
     *     normalizer="trim",
     *     pattern="^[a-z,A-Z,0-9,\s\\'\-_#,*@]+$/si",
     *     match=false,
     *     message="May only contain common and alphanumeric characters.")
     * @MongoDB\Field(
     *     name="transferor_class",
     *     type="string",
     *     nullable=true)
     */
    private ?string $transferorClass;

    /**
     * 7000
     * @Assert\NotNull(
     *     groups={"form1req", "form4req", "form5req"},
     *     message="This field cannot be empty (null).",
     * )
     * @Assert\NotBlank(
     *     groups={"form1req", "form4req", "form5req"},
     *     message="This field cannot be empty (blank).",
     * )
     * @Assert\Length(
     *     groups={"form1req"},
     *     max=93,
     *     maxMessage="The Maximum Length for this field on a Form 1 is {{ limit }} characters.")
     * @Assert\Length(
     *     groups={"form4req"},
     *     max=148,
     *     maxMessage="The Maximum Length for this field on a Form 4 is {{ limit }} characters.")
     * @Assert\Length(
     *     groups={"form5req"},
     *     max=148,
     *     maxMessage="The Maximum Length for this field on a Form 5 is {{ limit }} characters.")
     * @Assert\Regex(
     *     groups={"form1req", "form4req", "form5req"},
     *     normalizer="trim",
     *     pattern="^[a-z,A-Z,0-9,\s\\'\-_#,*@]+$/si",
     *     match=false,
     *     message="May only contain common and alphanumeric characters.")
     * @MongoDB\Field(
     *     name="transferee_alternate_address",
     *     type="string",
     *     nullable=true)
     */
    private ?string $transfereeAlternateAddress;


    /**
     * 7000
     * @Assert\NotNull(
     *     groups={"form1req", "form4req", "form5req"},
     *     message="This field cannot be empty (null).",
     * )
     * @Assert\NotBlank(
     *     groups={"form1req", "form4req", "form5req"},
     *     message="This field cannot be empty (blank).",
     * )
     * @Assert\Length(
     *     groups={"form1req"},
     *     max=93,
     *     maxMessage="The Maximum Length for this field on a Form 1 is {{ limit }} characters.")
     * @Assert\Length(
     *     groups={"form4req"},
     *     max=148,
     *     maxMessage="The Maximum Length for this field on a Form 4 is {{ limit }} characters.")
     * @Assert\Length(
     *     groups={"form5req"},
     *     max=148,
     *     maxMessage="The Maximum Length for this field on a Form 5 is {{ limit }} characters.")
     * @Assert\Regex(
     *     groups={"form1req", "form4req", "form5req"},
     *     normalizer="trim",
     *     pattern="^[a-z,A-Z,0-9,\s\\'\-_#,*@]+$/si",
     *     match=false,
     *     message="May only contain common and alphanumeric characters.")
     * @MongoDB\Field(
     *     name="transferor_alternate_address",
     *     type="string",
     *     nullable=true)
     */
    private ?string $transferorAlternateAddress;

    public function getTransfereeAlternateAddress(): ?string
    {
        return $this->transfereeAlternateAddress;
    }

    public function setTransfereeAlternateAddress(?string $transfereeAlternateAddress): void
    {
        $this->transfereeAlternateAddress = $transfereeAlternateAddress;
    }

    public function getTransferorAlternateAddress(): ?string
    {
        return $this->transferorAlternateAddress;
    }

    public function setTransferorAlternateAddress(?string $transferorAlternateAddress): void
    {
        $this->transferorAlternateAddress = $transferorAlternateAddress;
    }


    /**
     * 8000
     * @Assert\NotNull(
     *     groups={"form1req", "form4req", "form5req", "formRPreq"},
     *     message="This field cannot be empty (null).",
     * )
     * @Assert\NotBlank(
     *     groups={"form1req", "form4req", "form5req", "formRPreq"},
     *     message="This field cannot be empty (blank).",
     * )
     * @Assert\Length(
     *     groups={"form1req"},
     *     max=50,
     *     maxMessage="The Maximum Length for this field on a Form 1 is {{ limit }} characters.")
     * @Assert\Length(
     *     groups={"form4req"},
     *     max=48,
     *     maxMessage="The Maximum Length for this field on a Form 4 is {{ limit }} characters.")
     * @Assert\Length(
     *     groups={"form5req"},
     *     max=6,
     *     maxMessage="The Maximum Length for this field on a Form 5 is {{ limit }} characters.")
     * @Assert\Length(
     *     groups={"formRPreq"},
     *     max=6,
     *     maxMessage="The Maximum Length for this field on the Responsible Person Question is {{ limit }} characters.")
     * @Assert\Regex(
     *     groups={"form1req", "form4req", "form5req", "formRPreq"},
     *     normalizer="trim",
     *     pattern="^[a-z,A-Z,0-9,\s\\'\-_#,*@]+$/si",
     *     match=false,
     *     message="May only contain common and alphanumeric characters.")
     * @MongoDB\Field(
     *     name="manufacture_name",
     *     type="string",
     *     nullable=true)
     */
    private ?string $manufactureName;

    /**
     * 8010
     * @Assert\NotNull(
     *     groups={"form1req", "form4req", "form5req", "formRPreq"},
     *     message="This field cannot be empty (null).",
     * )
     * @Assert\NotBlank(
     *     groups={"form1req", "form4req", "form5req", "formRPreq"},
     *     message="This field cannot be empty (blank).",
     * )
     * @Assert\Length(
     *     groups={"form1req"},
     *     max=50,
     *     maxMessage="The Maximum Length for this field on a Form 1 is {{ limit }} characters.")
     * @Assert\Length(
     *     groups={"form4req"},
     *     max=48,
     *     maxMessage="The Maximum Length for this field on a Form 4 is {{ limit }} characters.")
     * @Assert\Length(
     *     groups={"form5req"},
     *     max=48,
     *     maxMessage="The Maximum Length for this field on a Form 5 is {{ limit }} characters.")
     * @Assert\Length(
     *     groups={"formRPreq"},
     *     max=48,
     *     maxMessage="The Maximum Length for this field on the Responsible Person Question is {{ limit }} characters.")
     * @Assert\Regex(
     *     groups={"form1req", "form4req", "form5req", "formRPreq"},
     *     normalizer="trim",
     *     pattern="^[a-z,A-Z,0-9,\s\\'\-_#,*@]+$/si",
     *     match=false,
     *     message="May only contain common and alphanumeric characters.")
     * @MongoDB\Field(
     *     name="manufacture_line1",
     *     type="string",
     *     nullable=true)
     */
    private ?string $manufactureLine1;

    /**
     * 8020
     * @Assert\NotNull(
     *     groups={"form1req"},
     *     message="This field cannot be empty (null).",
     * )
     * @Assert\NotBlank(
     *     groups={"form1req"},
     *     message="This field cannot be empty (blank).",
     * )
     * @Assert\Length(
     *     groups={"form1req"},
     *     max=50,
     *     maxMessage="The Maximum Length for this field on a Form 1 is {{ limit }} characters.")
     * @Assert\Regex(
     *     groups={"form1req"},
     *     normalizer="trim",
     *     pattern="^[a-z,A-Z,0-9,\s\\'\-_#,*@]+$/si",
     *     match=false,
     *     message="May only contain common and alphanumeric characters.")
     * @MongoDB\Field(
     *     name="manufacture_line2",
     *     type="string",
     *     nullable=true)
     */
    private ?string $manufactureLine2;

    /**
     * 8030
     * @Assert\NotNull(
     *     groups={"form1req", "form4req", "form5req", "formRPreq"},
     *     message="This field cannot be empty (null).",
     * )
     * @Assert\NotBlank(
     *     groups={"form1req", "form4req", "form5req", "formRPreq"},
     *     message="This field cannot be empty (blank).",
     * )
     * @Assert\Length(
     *     groups={"form1req"},
     *     max=34,
     *     maxMessage="The Maximum Length for this field on a Form 1 is {{ limit }} characters.")
     * @Assert\Length(
     *     groups={"form4req"},
     *     max=32,
     *     maxMessage="The Maximum Length for this field on a Form 4 is {{ limit }} characters.")
     * @Assert\Length(
     *     groups={"form5req"},
     *     max=32,
     *     maxMessage="The Maximum Length for this field on a Form 5 is {{ limit }} characters.")
     * @Assert\Length(
     *     groups={"formRPreq"},
     *     max=32,
     *     maxMessage="The Maximum Length for this field on the Responsible Person Question is {{ limit }} characters.")
     * @Assert\Regex(
     *     groups={"form1req", "form4req", "form5req", "formRPreq"},
     *     normalizer="trim",
     *     pattern="^[a-z,A-Z,0-9,\s\\'\-_#,*@]+$/si",
     *     match=false,
     *     message="May only contain common and alphanumeric characters.")
     * @MongoDB\Field(
     *     name="manufacture_city",
     *     type="string",
     *     nullable=true)
     */
    private ?string $manufactureCity;

    /**
     * 8040
     * @Assert\NotNull(
     *     groups={"form1req", "form4req", "form5req", "formRPreq"},
     *     message="This field cannot be empty (null).",
     * )
     * @Assert\NotBlank(
     *     groups={"form1req", "form4req", "form5req", "formRPreq"},
     *     message="This field cannot be empty (blank).",
     * )
     * @Assert\Length(
     *     groups={"form1req"},
     *     max=2,
     *     maxMessage="The Maximum Length for this field on a Form 1 is {{ limit }} characters.")
     * @Assert\Length(
     *     groups={"form4req"},
     *     max=2,
     *     maxMessage="The Maximum Length for this field on a Form 4 is {{ limit }} characters.")
     * @Assert\Length(
     *     groups={"form5req"},
     *     max=2,
     *     maxMessage="The Maximum Length for this field on a Form 5 is {{ limit }} characters.")
     * @Assert\Length(
     *     groups={"formRPreq"},
     *     max=2,
     *     maxMessage="The Maximum Length for this field on the Responsible Person Question is {{ limit }} characters.")
     * @Assert\Regex(
     *     groups={"form1req", "form4req", "form5req", "formRPreq"},
     *     normalizer="trim",
     *     pattern="^[a-z,A-Z,0-9,\s\\'\-_#,*@]+$/si",
     *     match=false,
     *     message="May only contain common and alphanumeric characters.")
     * @MongoDB\Field(
     *     name="manufacture_state",
     *     type="string",
     *     nullable=true)
     */
    private ?string $manufactureState;

    /**
     * 8050
     * @Assert\NotNull(
     *     groups={"form1req", "form4req", "form5req", "formRPreq"},
     *     message="This field cannot be empty (null).",
     * )
     * @Assert\NotBlank(
     *     groups={"form1req", "form4req", "form5req", "formRPreq"},
     *     message="This field cannot be empty (blank).",
     * )
     * @Assert\Length(
     *     groups={"form1req"},
     *     max=10,
     *     maxMessage="The Maximum Length for this field on a Form 1 is {{ limit }} characters.")
     * @Assert\Length(
     *     groups={"form4req"},
     *     max=10,
     *     maxMessage="The Maximum Length for this field on a Form 4 is {{ limit }} characters.")
     * @Assert\Length(
     *     groups={"form5req"},
     *     max=10,
     *     maxMessage="The Maximum Length for this field on a Form 5 is {{ limit }} characters.")
     * @Assert\Length(
     *     groups={"formRPreq"},
     *     max=10,
     *     maxMessage="The Maximum Length for this field on the Responsible Person Question is {{ limit }} characters.")
     * @Assert\Regex(
     *     groups={"form1req", "form4req", "form5req", "formRPreq"},
     *     normalizer="trim",
     *     pattern="^[a-z,A-Z,0-9,\s\\'\-_#,*@]+$/si",
     *     match=false,
     *     message="May only contain common and alphanumeric characters.")
     * @MongoDB\Field(
     *     name="manufacture_zipcode",
     *     type="string",
     *     nullable=true)
     */
    private ?string $manufactureZipcode;

    /**
     * 8060
     * @Assert\NotNull(
     *     groups={"form1req", "form4req", "form5req", "formRPreq"},
     *     message="This field cannot be empty (null).",
     * )
     * @Assert\NotBlank(
     *     groups={"form1req", "form4req", "form5req", "formRPreq"},
     *     message="This field cannot be empty (blank).",
     * )
     * @Assert\Length(
     *     groups={"form1req"},
     *     max=28,
     *     maxMessage="The Maximum Length for this field on a Form 1 is {{ limit }} characters.")
     * @Assert\Length(
     *     groups={"form4req"},
     *     max=28,
     *     maxMessage="The Maximum Length for this field on a Form 4 is {{ limit }} characters.")
     * @Assert\Length(
     *     groups={"form5req"},
     *     max=28,
     *     maxMessage="The Maximum Length for this field on a Form 5 is {{ limit }} characters.")
     * @Assert\Length(
     *     groups={"formRPreq"},
     *     max=28,
     *     maxMessage="The Maximum Length for this field on the Responsible Person Question is {{ limit }} characters.")
     * @Assert\Regex(
     *     groups={"form1req", "form4req", "form5req", "formRPreq"},
     *     normalizer="trim",
     *     pattern="^[a-z,A-Z,0-9,\s\\'\-_#,*@]+$/si",
     *     match=false,
     *     message="May only contain common and alphanumeric characters.")
     * @MongoDB\Field(
     *     name="firearm_type",
     *     type="string",
     *     nullable=true)
     */
    private ?string $firearmType;

    /**
     * 8070
     * @Assert\NotNull(
     *     groups={"form1req", "form4req", "form5req"},
     *     message="This field cannot be empty (null).",
     * )
     * @Assert\NotBlank(
     *     groups={"form1req", "form4req", "form5req"},
     *     message="This field cannot be empty (blank).",
     * )
     * @Assert\Length(
     *     groups={"form1req"},
     *     max=200,
     *     maxMessage="The Maximum Length for this field on a Form 1 is {{ limit }} characters.")
     * @Assert\Length(
     *     groups={"form4req"},
     *     max=275,
     *     maxMessage="The Maximum Length for this field on a Form 4 is {{ limit }} characters.")
     * @Assert\Length(
     *     groups={"form5req"},
     *     max=100,
     *     maxMessage="The Maximum Length for this field on a Form 5 is {{ limit }} characters.")
     * @Assert\Regex(
     *     groups={"form1req", "form4req", "form5req"},
     *     normalizer="trim",
     *     pattern="^[a-z,A-Z,0-9,\s\\'\-_#,*@]+$/si",
     *     match=false,
     *     message="May only contain common and alphanumeric characters.")
     * @MongoDB\Field(
     *     name="description",
     *     type="string",
     *     nullable=true)
     */
    private ?string $description;

    /**
     * 8080
     * @Assert\NotNull(
     *     groups={"form1req", "form4req", "form5req", "formRPreq"},
     *     message="This field cannot be empty (null).",
     * )
     * @Assert\NotBlank(
     *     groups={"form1req", "form4req", "form5req", "formRPreq"},
     *     message="This field cannot be empty (blank).",
     * )
     * @Assert\Length(
     *     groups={"form1req"},
     *     max=40,
     *     maxMessage="The Maximum Length for this field on a Form 1 is {{ limit }} characters.")
     * @Assert\Length(
     *     groups={"form4req"},
     *     max=40,
     *     maxMessage="The Maximum Length for this field on a Form 4 is {{ limit }} characters.")
     * @Assert\Length(
     *     groups={"form5req"},
     *     max=40,
     *     maxMessage="The Maximum Length for this field on a Form 5 is {{ limit }} characters.")
     * @Assert\Length(
     *     groups={"formRPreq"},
     *     max=40,
     *     maxMessage="The Maximum Length for this field on the Responsible Person Question is {{ limit }} characters.")
     * @Assert\Regex(
     *     groups={"form1req", "form4req", "form5req", "formRPreq"},
     *     normalizer="trim",
     *     pattern="^[a-z,A-Z,0-9,\s\\'\-_#,*@]+$/si",
     *     match=false,
     *     message="May only contain common and alphanumeric characters.")
     * @MongoDB\Field(
     *     name="model",
     *     type="string",
     *     nullable=true)
     */
    private ?string $model;

    /**
     * 8090
     * @Assert\NotNull(
     *     groups={"form1req", "form4req", "form5req", "formRPreq"},
     *     message="This field cannot be empty (null).",
     * )
     * @Assert\NotBlank(
     *     groups={"form1req", "form4req", "form5req", "formRPreq"},
     *     message="This field cannot be empty (blank).",
     * )
     * @Assert\Length(
     *     groups={"form1req"},
     *     max=38,
     *     maxMessage="The Maximum Length for this field on a Form 1 is {{ limit }} characters.")
     * @Assert\Length(
     *     groups={"form4req"},
     *     max=38,
     *     maxMessage="The Maximum Length for this field on a Form 4 is {{ limit }} characters.")
     * @Assert\Length(
     *     groups={"form5req"},
     *     max=38,
     *     maxMessage="The Maximum Length for this field on a Form 5 is {{ limit }} characters.")
     * @Assert\Length(
     *     groups={"formRPreq"},
     *     max=38,
     *     maxMessage="The Maximum Length for this field on the Responsible Person Question is {{ limit }} characters.")
     * @Assert\Regex(
     *     groups={"form1req", "form4req", "form5req", "formRPreq"},
     *     normalizer="trim",
     *     pattern="^[a-z,A-Z,0-9,\s\\'\-_#,*@]+$/si",
     *     match=false,
     *     message="May only contain common and alphanumeric characters.")
     * @MongoDB\Field(
     *     name="serial_no",
     *     type="string",
     *     nullable=true)
     */
    private ?string $serialNo;

    /**
     * 8100
     * @Assert\NotNull(
     *     groups={"form1req", "form4req", "form5req", "formRPreq"},
     *     message="This field cannot be empty (null).",
     * )
     * @Assert\NotBlank(
     *     groups={"form1req", "form4req", "form5req", "formRPreq"},
     *     message="This field cannot be empty (blank).",
     * )
     * @Assert\Length(
     *     groups={"form1req"},
     *     max=16,
     *     maxMessage="The Maximum Length for this field on a Form 1 is {{ limit }} characters.")
     * @Assert\Length(
     *     groups={"form4req"},
     *     max=16,
     *     maxMessage="The Maximum Length for this field on a Form 4 is {{ limit }} characters.")
     * @Assert\Length(
     *     groups={"form5req"},
     *     max=16,
     *     maxMessage="The Maximum Length for this field on a Form 5 is {{ limit }} characters.")
     * @Assert\Length(
     *     groups={"formRPreq"},
     *     max=16,
     *     maxMessage="The Maximum Length for this field on the Responsible Person Question is {{ limit }} characters.")
     * @Assert\Regex(
     *     groups={"form1req", "form4req", "form5req", "formRPreq"},
     *     normalizer="trim",
     *     pattern="^[a-z,A-Z,0-9,\s\\'\-_#,*@]+$/si",
     *     match=false,
     *     message="May only contain common and alphanumeric characters.")
     * @MongoDB\Field(
     *     name="caliber",
     *     type="string",
     *     nullable=true)
     */
    private ?string $caliber;

    /**
     * 8110
     * @Assert\NotNull(
     *     groups={"form1req", "form4req", "form5req", "formRPreq"},
     *     message="This field cannot be empty (null).",
     * )
     * @Assert\NotBlank(
     *     groups={"form1req", "form4req", "form5req", "formRPreq"},
     *     message="This field cannot be empty (blank).",
     * )
     * @Assert\Length(
     *     groups={"form1req"},
     *     max=10,
     *     maxMessage="The Maximum Length for this field on a Form 1 is {{ limit }} characters.")
     * @Assert\Length(
     *     groups={"form4req"},
     *     max=10,
     *     maxMessage="The Maximum Length for this field on a Form 4 is {{ limit }} characters.")
     * @Assert\Length(
     *     groups={"form5req"},
     *     max=10,
     *     maxMessage="The Maximum Length for this field on a Form 5 is {{ limit }} characters.")
     * @Assert\Length(
     *     groups={"formRPreq"},
     *     max=10,
     *     maxMessage="The Maximum Length for this field on the Responsible Person Question is {{ limit }} characters.")
     * @Assert\Regex(
     *     groups={"form1req", "form4req", "form5req", "formRPreq"},
     *     normalizer="trim",
     *     pattern="^[a-z,A-Z,0-9,\s\\'\-_#,*@]+$/si",
     *     match=false,
     *     message="May only contain common and alphanumeric characters.")
     * @MongoDB\Field(
     *     name="caliber_unit",
     *     type="string",
     *     nullable=true)
     */
    private ?string $caliberUnit;

    /**
     * 8120
     * @Assert\NotNull(
     *     groups={"form1req", "form4req", "form5req"},
     *     message="This field cannot be empty (null).",
     * )
     * @Assert\NotBlank(
     *     groups={"form1req", "form4req", "form5req"},
     *     message="This field cannot be empty (blank).",
     * )
     * @Assert\Length(
     *     groups={"form1req"},
     *     max=22,
     *     maxMessage="The Maximum Length for this field on a Form 1 is {{ limit }} characters.")
     * @Assert\Length(
     *     groups={"form4req"},
     *     max=18,
     *     maxMessage="The Maximum Length for this field on a Form 4 is {{ limit }} characters.")
     * @Assert\Length(
     *     groups={"form5req"},
     *     max=15,
     *     maxMessage="The Maximum Length for this field on a Form 5 is {{ limit }} characters.")
     * @Assert\Regex(
     *     groups={"form1req", "form4req", "form5req"},
     *     normalizer="trim",
     *     pattern="^[a-z,A-Z,0-9,\s\\'\-_#,*@]+$/si",
     *     match=false,
     *     message="May only contain common and alphanumeric characters.")
     * @MongoDB\Field(
     *     name="length_barrel",
     *     type="string",
     *     nullable=true)
     */
    private ?string $lengthBarrel;

    /**
     * 8130
     * @Assert\NotNull(
     *     groups={"form1req", "form4req", "form5req"},
     *     message="This field cannot be empty (null).",
     * )
     * @Assert\NotBlank(
     *     groups={"form1req", "form4req", "form5req"},
     *     message="This field cannot be empty (blank).",
     * )
     * @Assert\Length(
     *     groups={"form1req"},
     *     max=20,
     *     maxMessage="The Maximum Length for this field on a Form 1 is {{ limit }} characters.")
     * @Assert\Length(
     *     groups={"form4req"},
     *     max=19,
     *     maxMessage="The Maximum Length for this field on a Form 4 is {{ limit }} characters.")
     * @Assert\Length(
     *     groups={"form5req"},
     *     max=13,
     *     maxMessage="The Maximum Length for this field on a Form 5 is {{ limit }} characters.")
     * @Assert\Regex(
     *     groups={"form1req", "form4req", "form5req"},
     *     normalizer="trim",
     *     pattern="^[a-z,A-Z,0-9,\s\\'\-_#,*@]+$/si",
     *     match=false,
     *     message="May only contain common and alphanumeric characters.")
     * @MongoDB\Field(
     *     name="length_overall",
     *     type="string",
     *     nullable=true)
     */
    private ?string $lengthOverall;

    /**
     * 8140
     * @Assert\NotNull(
     *     groups={"form1req"},
     *     message="This field cannot be empty (null).",
     * )
     * @Assert\NotBlank(
     *     groups={"form1req"},
     *     message="This field cannot be empty (blank).",
     * )
     * @Assert\Length(
     *     groups={"form1req"},
     *     max=12,
     *     maxMessage="The Maximum Length for this field on a Form 1 is {{ limit }} characters.")
     * @Assert\Regex(
     *     groups={"form1req"},
     *     normalizer="trim",
     *     pattern="^[a-z,A-Z,0-9,\s\\'\-_#,*@]+$/si",
     *     match=false,
     *     message="May only contain common and alphanumeric characters.")
     * @MongoDB\Field(
     *     name="dd_type",
     *     type="string",
     *     nullable=true)
     */
    private ?string $ddType;

    /**
     * 8150
     * @Assert\NotNull(
     *     groups={"form1req"},
     *     message="This field cannot be empty (null).",
     * )
     * @Assert\NotBlank(
     *     groups={"form1req"},
     *     message="This field cannot be empty (blank).",
     * )
     * @Assert\Length(
     *     groups={"form1req"},
     *     max=67,
     *     maxMessage="The Maximum Length for this field on a Form 1 is {{ limit }} characters.")
     * @Assert\Regex(
     *     groups={"form1req"},
     *     normalizer="trim",
     *     pattern="^[a-z,A-Z,0-9,\s\\'\-_#,*@]+$/si",
     *     match=false,
     *     message="May only contain common and alphanumeric characters.")
     * @MongoDB\Field(
     *     name="dd_explosive",
     *     type="string",
     *     nullable=true)
     */
    private ?string $ddExplosive;

    /**
     * 8160
     * @Assert\NotNull(
     *     groups={"form1req"},
     *     message="This field cannot be empty (null).",
     * )
     * @Assert\NotBlank(
     *     groups={"form1req"},
     *     message="This field cannot be empty (blank).",
     * )
     * @Assert\Length(
     *     groups={"form1req"},
     *     max=3,
     *     maxMessage="The Maximum Length for this field on a Form 1 is {{ limit }} characters.")
     * @Assert\Regex(
     *     groups={"form1req"},
     *     normalizer="trim",
     *     pattern="^[a-z,A-Z,0-9,\s\\'\-_#,*@]+$/si",
     *     match=false,
     *     message="May only contain common and alphanumeric characters.")
     * @MongoDB\Field(
     *     name="firearm_reactivated",
     *     type="string",
     *     nullable=true)
     */
    private ?string $firearmReactivated;

    /**
     * 8170
     * @Assert\NotNull(
     *     groups={"form5req"},
     *     message="This field cannot be empty (null).",
     * )
     * @Assert\NotBlank(
     *     groups={"form5req"},
     *     message="This field cannot be empty (blank).",
     * )
     * @Assert\Length(
     *     groups={"form5req"},
     *     max=3,
     *     maxMessage="The Maximum Length for this field on a Form 5 is {{ limit }} characters.")
     * @Assert\Regex(
     *     groups={"form5req"},
     *     normalizer="trim",
     *     pattern="^[a-z,A-Z,0-9,\s\\'\-_#,*@]+$/si",
     *     match=false,
     *     message="May only contain common and alphanumeric characters.")
     * @MongoDB\Field(
     *     name="rendered_unserviceable",
     *     type="string",
     *     nullable=true)
     */
    private ?string $renderedUnserviceable;

    /**
     * 9000
     * @Assert\NotNull(
     *     groups={"form1req", "form4req", "form5req", "formRPreq"},
     *     message="This field cannot be empty (null).",
     * )
     * @Assert\NotBlank(
     *     groups={"form1req", "form4req", "form5req", "formRPreq"},
     *     message="This field cannot be empty (blank).",
     * )
     * @Assert\Length(
     *     groups={"form4req"},
     *     max=65,
     *     maxMessage="The Maximum Length for this field on a Form 4 is {{ limit }} characters.")
     * @Assert\Length(
     *     groups={"form5req"},
     *     max=65,
     *     maxMessage="The Maximum Length for this field on a Form 5 is {{ limit }} characters.")
     * @Assert\Length(
     *     groups={"formRPreq"},
     *     max=65,
     *     maxMessage="The Maximum Length for this field on the Responsible Person Question is {{ limit }} characters.")
     * @Assert\Regex(
     *     groups={"form1req", "form4req", "form5req", "formRPreq"},
     *     normalizer="trim",
     *     pattern="^[a-z,A-Z,0-9,\s\\'\-_#,*@]+$/si",
     *     match=false,
     *     message="May only contain common and alphanumeric characters.")
     * @MongoDB\Field(
     *     name="clo_agency",
     *     type="string",
     *     nullable=true)
     */
    private ?string $cloAgency;

    /**
     * 9010
     * @Assert\NotNull(
     *     groups={"form1req", "form4req", "form5req", "formRPreq"},
     *     message="This field cannot be empty (null).",
     * )
     * @Assert\NotBlank(
     *     groups={"form1req", "form4req", "form5req", "formRPreq"},
     *     message="This field cannot be empty (blank).",
     * )
     * @Assert\Length(
     *     groups={"form1req"},
     *     max=50,
     *     maxMessage="The Maximum Length for this field on a Form 1 is {{ limit }} characters.")
     * @Assert\Length(
     *     groups={"form4req"},
     *     max=50,
     *     maxMessage="The Maximum Length for this field on a Form 4 is {{ limit }} characters.")
     * @Assert\Length(
     *     groups={"form5req"},
     *     max=50,
     *     maxMessage="The Maximum Length for this field on a Form 5 is {{ limit }} characters.")
     * @Assert\Length(
     *     groups={"formRPreq"},
     *     max=50,
     *     maxMessage="The Maximum Length for this field on the Responsible Person Question is {{ limit }} characters.")
     * @Assert\Regex(
     *     groups={"form1req", "form4req", "form5req", "formRPreq"},
     *     normalizer="trim",
     *     pattern="^[a-z,A-Z,0-9,\s\\'\-_#,*@]+$/si",
     *     match=false,
     *     message="May only contain common and alphanumeric characters.")
     * @MongoDB\Field(
     *     name="clo_name",
     *     type="string",
     *     nullable=true)
     */
    private ?string $cloName;

    /**
     * 9020
     * @Assert\NotNull(
     *     groups={"form1req", "form4req", "form5req", "formRPreq"},
     *     message="This field cannot be empty (null).",
     * )
     * @Assert\NotBlank(
     *     groups={"form1req", "form4req", "form5req", "formRPreq"},
     *     message="This field cannot be empty (blank).",
     * )
     * @Assert\Length(
     *     groups={"form1req"},
     *     max=20,
     *     maxMessage="The Maximum Length for this field on a Form 1 is {{ limit }} characters.")
     * @Assert\Length(
     *     groups={"form4req"},
     *     max=20,
     *     maxMessage="The Maximum Length for this field on a Form 4 is {{ limit }} characters.")
     * @Assert\Length(
     *     groups={"form5req"},
     *     max=20,
     *     maxMessage="The Maximum Length for this field on a Form 5 is {{ limit }} characters.")
     * @Assert\Length(
     *     groups={"formRPreq"},
     *     max=20,
     *     maxMessage="The Maximum Length for this field on the Responsible Person Question is {{ limit }} characters.")
     * @Assert\Regex(
     *     groups={"form1req", "form4req", "form5req", "formRPreq"},
     *     normalizer="trim",
     *     pattern="^[a-z,A-Z,0-9,\s\\'\-_#,*@]+$/si",
     *     match=false,
     *     message="May only contain common and alphanumeric characters.")
     * @MongoDB\Field(
     *     name="clo_title",
     *     type="string",
     *     nullable=true)
     */
    private ?string $cloTitle;

    /**
     * 9030
     * @Assert\NotNull(
     *     groups={"form1req", "form4req", "form5req", "formRPreq"},
     *     message="This field cannot be empty (null).",
     * )
     * @Assert\NotBlank(
     *     groups={"form1req", "form4req", "form5req", "formRPreq"},
     *     message="This field cannot be empty (blank).",
     * )
     * @Assert\Length(
     *     groups={"form1req"},
     *     max=100,
     *     maxMessage="The Maximum Length for this field on a Form 1 is {{ limit }} characters.")
     * @Assert\Length(
     *     groups={"form4req"},
     *     max=100,
     *     maxMessage="The Maximum Length for this field on a Form 4 is {{ limit }} characters.")
     * @Assert\Length(
     *     groups={"form5req"},
     *     max=100,
     *     maxMessage="The Maximum Length for this field on a Form 5 is {{ limit }} characters.")
     * @Assert\Length(
     *     groups={"formRPreq"},
     *     max=100,
     *     maxMessage="The Maximum Length for this field on the Responsible Person Question is {{ limit }} characters.")
     * @Assert\Regex(
     *     groups={"form1req", "form4req", "form5req", "formRPreq"},
     *     normalizer="trim",
     *     pattern="^[a-z,A-Z,0-9,\s\\'\-_#,*@]+$/si",
     *     match=false,
     *     message="May only contain common and alphanumeric characters.")
     * @MongoDB\Field(
     *     name="clo_line1",
     *     type="string",
     *     nullable=true)
     */
    private ?string $cloLine1;

    /**
     * 9050
     * @Assert\NotNull(
     *     groups={"form1req", "form4req", "form5req", "formRPreq"},
     *     message="This field cannot be empty (null).",
     * )
     * @Assert\NotBlank(
     *     groups={"form1req", "form4req", "form5req", "formRPreq"},
     *     message="This field cannot be empty (blank).",
     * )
     * @Assert\Length(
     *     groups={"form1req"},
     *     max=75,
     *     maxMessage="The Maximum Length for this field on a Form 1 is {{ limit }} characters.")
     * @Assert\Length(
     *     groups={"form4req"},
     *     max=75,
     *     maxMessage="The Maximum Length for this field on a Form 4 is {{ limit }} characters.")
     * @Assert\Length(
     *     groups={"form5req"},
     *     max=75,
     *     maxMessage="The Maximum Length for this field on a Form 5 is {{ limit }} characters.")
     * @Assert\Length(
     *     groups={"formRPreq"},
     *     max=75,
     *     maxMessage="The Maximum Length for this field on the Responsible Person Question is {{ limit }} characters.")
     * @Assert\Regex(
     *     groups={"form1req", "form4req", "form5req", "formRPreq"},
     *     normalizer="trim",
     *     pattern="^[a-z,A-Z,0-9,\s\\'\-_#,*@]+$/si",
     *     match=false,
     *     message="May only contain common and alphanumeric characters.")
     * @MongoDB\Field(
     *     name="clo_city",
     *     type="string",
     *     nullable=true)
     */
    private ?string $cloCity;

    /**
     * 9060
     * @Assert\NotNull(
     *     groups={"form1req", "form4req", "form5req", "formRPreq"},
     *     message="This field cannot be empty (null).",
     * )
     * @Assert\NotBlank(
     *     groups={"form1req", "form4req", "form5req", "formRPreq"},
     *     message="This field cannot be empty (blank).",
     * )
     * @Assert\Length(
     *     groups={"form1req"},
     *     max=2,
     *     maxMessage="The Maximum Length for this field on a Form 1 is {{ limit }} characters.")
     * @Assert\Length(
     *     groups={"form4req"},
     *     max=2,
     *     maxMessage="The Maximum Length for this field on a Form 4 is {{ limit }} characters.")
     * @Assert\Length(
     *     groups={"form5req"},
     *     max=2,
     *     maxMessage="The Maximum Length for this field on a Form 5 is {{ limit }} characters.")
     * @Assert\Length(
     *     groups={"formRPreq"},
     *     max=2,
     *     maxMessage="The Maximum Length for this field on the Responsible Person Question is {{ limit }} characters.")
     * @Assert\Regex(
     *     groups={"form1req", "form4req", "form5req", "formRPreq"},
     *     normalizer="trim",
     *     pattern="^[a-z,A-Z,0-9,\s\\'\-_#,*@]+$/si",
     *     match=false,
     *     message="May only contain common and alphanumeric characters.")
     * @MongoDB\Field(
     *     name="clo_state",
     *     type="string",
     *     nullable=true)
     */
    private ?string $cloState;

    /**
     * 9070
     * @Assert\NotNull(
     *     groups={"form1req", "form4req", "form5req", "formRPreq"},
     *     message="This field cannot be empty (null).",
     * )
     * @Assert\NotBlank(
     *     groups={"form1req", "form4req", "form5req", "formRPreq"},
     *     message="This field cannot be empty (blank).",
     * )
     * @Assert\Length(
     *     groups={"form1req"},
     *     max=10,
     *     maxMessage="The Maximum Length for this field on a Form 1 is {{ limit }} characters.")
     * @Assert\Length(
     *     groups={"form4req"},
     *     max=10,
     *     maxMessage="The Maximum Length for this field on a Form 4 is {{ limit }} characters.")
     * @Assert\Length(
     *     groups={"form5req"},
     *     max=10,
     *     maxMessage="The Maximum Length for this field on a Form 5 is {{ limit }} characters.")
     * @Assert\Length(
     *     groups={"formRPreq"},
     *     max=10,
     *     maxMessage="The Maximum Length for this field on the Responsible Person Question is {{ limit }} characters.")
     * @Assert\Regex(
     *     groups={"form1req", "form4req", "form5req", "formRPreq"},
     *     normalizer="trim",
     *     pattern="^[a-z,A-Z,0-9,\s\\'\-_#,*@]+$/si",
     *     match=false,
     *     message="May only contain common and alphanumeric characters.")
     * @MongoDB\Field(
     *     name="clo_zipcode",
     *     type="string",
     *     nullable=true)
     */
    private ?string $cloZipcode;

    /**
     * 10000
     * @Assert\NotNull(
     *     groups={"form1req", "form4req", "form5req"},
     *     message="This field cannot be empty (null).",
     * )
     * @Assert\NotBlank(
     *     groups={"form1req", "form4req", "form5req"},
     *     message="This field cannot be empty (blank).",
     * )
     * @Assert\Length(
     *     groups={"form4req"},
     *     max=59,
     *     maxMessage="The Maximum Length for this field on a Form 4 is {{ limit }} characters.")
     * @Assert\Length(
     *     groups={"form5req"},
     *     max=59,
     *     maxMessage="The Maximum Length for this field on a Form 5 is {{ limit }} characters.")
     * @Assert\Regex(
     *     groups={"form1req", "form4req", "form5req"},
     *     normalizer="trim",
     *     pattern="^[a-z,A-Z,0-9,\s\\'\-_#,*@]+$/si",
     *     match=false,
     *     message="May only contain common and alphanumeric characters.")
     * @MongoDB\Field(
     *     name="statement_name_title",
     *     type="string",
     *     nullable=true)
     */
    private ?string $statementNameTitle;

    /**
     * 10030
     * @Assert\NotNull(
     *     groups={"form1req", "form4req", "form5req"},
     *     message="This field cannot be empty (null).",
     * )
     * @Assert\NotBlank(
     *     groups={"form1req", "form4req", "form5req"},
     *     message="This field cannot be empty (blank).",
     * )
     * @Assert\Length(
     *     groups={"form1req"},
     *     max=265,
     *     maxMessage="The Maximum Length for this field on a Form 1 is {{ limit }} characters.")
     * @Assert\Length(
     *     groups={"form4req"},
     *     max=180,
     *     maxMessage="The Maximum Length for this field on a Form 4 is {{ limit }} characters.")
     * @Assert\Length(
     *     groups={"form5req"},
     *     max=180,
     *     maxMessage="The Maximum Length for this field on a Form 5 is {{ limit }} characters.")
     * @Assert\Regex(
     *     groups={"form1req", "form4req", "form5req"},
     *     normalizer="trim",
     *     pattern="^[a-z,A-Z,0-9,\s\\'\-_#,*@]+$/si",
     *     match=false,
     *     message="May only contain common and alphanumeric characters.")
     * @MongoDB\Field(
     *     name="statement_purpose",
     *     type="string",
     *     nullable=true)
     */
    private ?string $statementPurpose;

    /**
     * 11000
     * @Assert\NotNull(
     *     groups={"form1req", "form4req", "form5req", "formRPreq"},
     *     message="This field cannot be empty (null).",
     * )
     * @Assert\NotBlank(
     *     groups={"form1req", "form4req", "form5req", "formRPreq"},
     *     message="This field cannot be empty (blank).",
     * )
     * @Assert\Length(
     *     groups={"form1req"},
     *     max=3,
     *     maxMessage="The Maximum Length for this field on a Form 1 is {{ limit }} characters.")
     * @Assert\Length(
     *     groups={"form4req"},
     *     max=3,
     *     maxMessage="The Maximum Length for this field on a Form 4 is {{ limit }} characters.")
     * @Assert\Length(
     *     groups={"form5req"},
     *     max=3,
     *     maxMessage="The Maximum Length for this field on a Form 5 is {{ limit }} characters.")
     * @Assert\Length(
     *     groups={"formRPreq"},
     *     max=3,
     *     maxMessage="The Maximum Length for this field on the Responsible Person Question is {{ limit }} characters.")
     * @Assert\Regex(
     *     groups={"form1req", "form4req", "form5req", "formRPreq"},
     *     normalizer="trim",
     *     pattern="^[a-z,A-Z,0-9,\s\\'\-_#,*@]+$/si",
     *     match=false,
     *     message="May only contain common and alphanumeric characters.")
     * @MongoDB\Field(
     *     name="a",
     *     type="string",
     *     nullable=true)
     */
    private ?string $a;

    /**
     * 11010
     * @Assert\NotNull(
     *     groups={"form1req", "form4req", "form5req", "formRPreq"},
     *     message="This field cannot be empty (null).",
     * )
     * @Assert\NotBlank(
     *     groups={"form1req", "form4req", "form5req", "formRPreq"},
     *     message="This field cannot be empty (blank).",
     * )
     * @Assert\Length(
     *     groups={"form1req"},
     *     max=3,
     *     maxMessage="The Maximum Length for this field on a Form 1 is {{ limit }} characters.")
     * @Assert\Length(
     *     groups={"form4req"},
     *     max=3,
     *     maxMessage="The Maximum Length for this field on a Form 4 is {{ limit }} characters.")
     * @Assert\Length(
     *     groups={"form5req"},
     *     max=3,
     *     maxMessage="The Maximum Length for this field on a Form 5 is {{ limit }} characters.")
     * @Assert\Length(
     *     groups={"formRPreq"},
     *     max=3,
     *     maxMessage="The Maximum Length for this field on the Responsible Person Question is {{ limit }} characters.")
     * @Assert\Regex(
     *     groups={"form1req", "form4req", "form5req", "formRPreq"},
     *     normalizer="trim",
     *     pattern="^[a-z,A-Z,0-9,\s\\'\-_#,*@]+$/si",
     *     match=false,
     *     message="May only contain common and alphanumeric characters.")
     * @MongoDB\Field(
     *     name="b",
     *     type="string",
     *     nullable=true)
     */
    private ?string $b;

    /**
     * 11020
     * @Assert\NotNull(
     *     groups={"form1req", "form4req", "form5req", "formRPreq"},
     *     message="This field cannot be empty (null).",
     * )
     * @Assert\NotBlank(
     *     groups={"form1req", "form4req", "form5req", "formRPreq"},
     *     message="This field cannot be empty (blank).",
     * )
     * @Assert\Length(
     *     groups={"form1req"},
     *     max=3,
     *     maxMessage="The Maximum Length for this field on a Form 1 is {{ limit }} characters.")
     * @Assert\Length(
     *     groups={"form4req"},
     *     max=3,
     *     maxMessage="The Maximum Length for this field on a Form 4 is {{ limit }} characters.")
     * @Assert\Length(
     *     groups={"form5req"},
     *     max=3,
     *     maxMessage="The Maximum Length for this field on a Form 5 is {{ limit }} characters.")
     * @Assert\Length(
     *     groups={"formRPreq"},
     *     max=3,
     *     maxMessage="The Maximum Length for this field on the Responsible Person Question is {{ limit }} characters.")
     * @Assert\Regex(
     *     groups={"form1req", "form4req", "form5req", "formRPreq"},
     *     normalizer="trim",
     *     pattern="^[a-z,A-Z,0-9,\s\\'\-_#,*@]+$/si",
     *     match=false,
     *     message="May only contain common and alphanumeric characters.")
     * @MongoDB\Field(
     *     name="c",
     *     type="string",
     *     nullable=true)
     */
    private ?string $c;

    /**
     * 11030
     * @Assert\NotNull(
     *     groups={"form1req", "form4req", "form5req", "formRPreq"},
     *     message="This field cannot be empty (null).",
     * )
     * @Assert\NotBlank(
     *     groups={"form1req", "form4req", "form5req", "formRPreq"},
     *     message="This field cannot be empty (blank).",
     * )
     * @Assert\Length(
     *     groups={"form1req"},
     *     max=3,
     *     maxMessage="The Maximum Length for this field on a Form 1 is {{ limit }} characters.")
     * @Assert\Length(
     *     groups={"form4req"},
     *     max=3,
     *     maxMessage="The Maximum Length for this field on a Form 4 is {{ limit }} characters.")
     * @Assert\Length(
     *     groups={"form5req"},
     *     max=3,
     *     maxMessage="The Maximum Length for this field on a Form 5 is {{ limit }} characters.")
     * @Assert\Length(
     *     groups={"formRPreq"},
     *     max=3,
     *     maxMessage="The Maximum Length for this field on the Responsible Person Question is {{ limit }} characters.")
     * @Assert\Regex(
     *     groups={"form1req", "form4req", "form5req", "formRPreq"},
     *     normalizer="trim",
     *     pattern="^[a-z,A-Z,0-9,\s\\'\-_#,*@]+$/si",
     *     match=false,
     *     message="May only contain common and alphanumeric characters.")
     * @MongoDB\Field(
     *     name="d",
     *     type="string",
     *     nullable=true)
     */
    private ?string $d;

    /**
     * 11040
     * @Assert\NotNull(
     *     groups={"form1req", "form4req", "form5req", "formRPreq"},
     *     message="This field cannot be empty (null).",
     * )
     * @Assert\NotBlank(
     *     groups={"form1req", "form4req", "form5req", "formRPreq"},
     *     message="This field cannot be empty (blank).",
     * )
     * @Assert\Length(
     *     groups={"form1req"},
     *     max=3,
     *     maxMessage="The Maximum Length for this field on a Form 1 is {{ limit }} characters.")
     * @Assert\Length(
     *     groups={"form4req"},
     *     max=3,
     *     maxMessage="The Maximum Length for this field on a Form 4 is {{ limit }} characters.")
     * @Assert\Length(
     *     groups={"form5req"},
     *     max=3,
     *     maxMessage="The Maximum Length for this field on a Form 5 is {{ limit }} characters.")
     * @Assert\Length(
     *     groups={"formRPreq"},
     *     max=3,
     *     maxMessage="The Maximum Length for this field on the Responsible Person Question is {{ limit }} characters.")
     * @Assert\Regex(
     *     groups={"form1req", "form4req", "form5req", "formRPreq"},
     *     normalizer="trim",
     *     pattern="^[a-z,A-Z,0-9,\s\\'\-_#,*@]+$/si",
     *     match=false,
     *     message="May only contain common and alphanumeric characters.")
     * @MongoDB\Field(
     *     name="e",
     *     type="string",
     *     nullable=true)
     */
    private ?string $e;

    /**
     * 11050
     * @Assert\NotNull(
     *     groups={"form1req", "form4req", "form5req", "formRPreq"},
     *     message="This field cannot be empty (null).",
     * )
     * @Assert\NotBlank(
     *     groups={"form1req", "form4req", "form5req", "formRPreq"},
     *     message="This field cannot be empty (blank).",
     * )
     * @Assert\Length(
     *     groups={"form1req"},
     *     max=3,
     *     maxMessage="The Maximum Length for this field on a Form 1 is {{ limit }} characters.")
     * @Assert\Length(
     *     groups={"form4req"},
     *     max=3,
     *     maxMessage="The Maximum Length for this field on a Form 4 is {{ limit }} characters.")
     * @Assert\Length(
     *     groups={"form5req"},
     *     max=3,
     *     maxMessage="The Maximum Length for this field on a Form 5 is {{ limit }} characters.")
     * @Assert\Length(
     *     groups={"formRPreq"},
     *     max=3,
     *     maxMessage="The Maximum Length for this field on the Responsible Person Question is {{ limit }} characters.")
     * @Assert\Regex(
     *     groups={"form1req", "form4req", "form5req", "formRPreq"},
     *     normalizer="trim",
     *     pattern="^[a-z,A-Z,0-9,\s\\'\-_#,*@]+$/si",
     *     match=false,
     *     message="May only contain common and alphanumeric characters.")
     * @MongoDB\Field(
     *     name="f",
     *     type="string",
     *     nullable=true)
     */
    private ?string $f;

    /**
     * 11060
     * @Assert\NotNull(
     *     groups={"form1req", "form4req", "form5req", "formRPreq"},
     *     message="This field cannot be empty (null).",
     * )
     * @Assert\NotBlank(
     *     groups={"form1req", "form4req", "form5req", "formRPreq"},
     *     message="This field cannot be empty (blank).",
     * )
     * @Assert\Length(
     *     groups={"form1req"},
     *     max=3,
     *     maxMessage="The Maximum Length for this field on a Form 1 is {{ limit }} characters.")
     * @Assert\Length(
     *     groups={"form4req"},
     *     max=3,
     *     maxMessage="The Maximum Length for this field on a Form 4 is {{ limit }} characters.")
     * @Assert\Length(
     *     groups={"form5req"},
     *     max=3,
     *     maxMessage="The Maximum Length for this field on a Form 5 is {{ limit }} characters.")
     * @Assert\Length(
     *     groups={"formRPreq"},
     *     max=3,
     *     maxMessage="The Maximum Length for this field on the Responsible Person Question is {{ limit }} characters.")
     * @Assert\Regex(
     *     groups={"form1req", "form4req", "form5req", "formRPreq"},
     *     normalizer="trim",
     *     pattern="^[a-z,A-Z,0-9,\s\\'\-_#,*@]+$/si",
     *     match=false,
     *     message="May only contain common and alphanumeric characters.")
     * @MongoDB\Field(
     *     name="g",
     *     type="string",
     *     nullable=true)
     */
    private ?string $g;

    /**
     * 11070
     * @Assert\NotNull(
     *     groups={"form1req", "form4req", "form5req", "formRPreq"},
     *     message="This field cannot be empty (null).",
     * )
     * @Assert\NotBlank(
     *     groups={"form1req", "form4req", "form5req", "formRPreq"},
     *     message="This field cannot be empty (blank).",
     * )
     * @Assert\Length(
     *     groups={"form1req"},
     *     max=3,
     *     maxMessage="The Maximum Length for this field on a Form 1 is {{ limit }} characters.")
     * @Assert\Length(
     *     groups={"form4req"},
     *     max=3,
     *     maxMessage="The Maximum Length for this field on a Form 4 is {{ limit }} characters.")
     * @Assert\Length(
     *     groups={"form5req"},
     *     max=3,
     *     maxMessage="The Maximum Length for this field on a Form 5 is {{ limit }} characters.")
     * @Assert\Length(
     *     groups={"formRPreq"},
     *     max=3,
     *     maxMessage="The Maximum Length for this field on the Responsible Person Question is {{ limit }} characters.")
     * @Assert\Regex(
     *     groups={"form1req", "form4req", "form5req", "formRPreq"},
     *     normalizer="trim",
     *     pattern="^[a-z,A-Z,0-9,\s\\'\-_#,*@]+$/si",
     *     match=false,
     *     message="May only contain common and alphanumeric characters.")
     * @MongoDB\Field(
     *     name="h",
     *     type="string",
     *     nullable=true)
     */
    private ?string $h;

    /**
     * 11080
     * @Assert\NotNull(
     *     groups={"form1req", "form4req", "form5req", "formRPreq"},
     *     message="This field cannot be empty (null).",
     * )
     * @Assert\NotBlank(
     *     groups={"form1req", "form4req", "form5req", "formRPreq"},
     *     message="This field cannot be empty (blank).",
     * )
     * @Assert\Length(
     *     groups={"form1req"},
     *     max=10,
     *     maxMessage="The Maximum Length for this field on a Form 1 is {{ limit }} characters.")
     * @Assert\Length(
     *     groups={"form4req"},
     *     max=10,
     *     maxMessage="The Maximum Length for this field on a Form 4 is {{ limit }} characters.")
     * @Assert\Length(
     *     groups={"form5req"},
     *     max=10,
     *     maxMessage="The Maximum Length for this field on a Form 5 is {{ limit }} characters.")
     * @Assert\Length(
     *     groups={"formRPreq"},
     *     max=10,
     *     maxMessage="The Maximum Length for this field on the Responsible Person Question is {{ limit }} characters.")
     * @Assert\Regex(
     *     groups={"form1req", "form4req", "form5req", "formRPreq"},
     *     normalizer="trim",
     *     pattern="^[a-z,A-Z,0-9,\s\\'\-_#,*@]+$/si",
     *     match=false,
     *     message="May only contain common and alphanumeric characters.")
     * @MongoDB\Field(
     *     name="date_of_birth",
     *     type="date",
     *     nullable=true)
     */
    private ?Datetime $dateOfBirth;

    /**
     * 11090
     * @Assert\NotNull(
     *     groups={"form1req", "form4req", "form5req", "formRPreq"},
     *     message="This field cannot be empty (null).",
     * )
     * @Assert\NotBlank(
     *     groups={"form1req", "form4req", "form5req", "formRPreq"},
     *     message="This field cannot be empty (blank).",
     * )
     * @Assert\Length(
     *     groups={"form1req"},
     *     max=20,
     *     maxMessage="The Maximum Length for this field on a Form 1 is {{ limit }} characters.")
     * @Assert\Length(
     *     groups={"form4req"},
     *     max=20,
     *     maxMessage="The Maximum Length for this field on a Form 4 is {{ limit }} characters.")
     * @Assert\Length(
     *     groups={"form5req"},
     *     max=20,
     *     maxMessage="The Maximum Length for this field on a Form 5 is {{ limit }} characters.")
     * @Assert\Length(
     *     groups={"formRPreq"},
     *     max=20,
     *     maxMessage="The Maximum Length for this field on the Responsible Person Question is {{ limit }} characters.")
     * @Assert\Regex(
     *     groups={"form1req", "form4req", "form5req", "formRPreq"},
     *     normalizer="trim",
     *     pattern="^[a-z,A-Z,0-9,\s\\'\-_#,*@]+$/si",
     *     match=false,
     *     message="May only contain common and alphanumeric characters.")
     * @MongoDB\Field(
     *     name="ssn",
     *     type="string",
     *     nullable=true)
     */
    private ?string $ssn;

    /**
     * 11100
     * @Assert\NotNull(
     *     groups={"form1req", "form4req", "form5req", "formRPreq"},
     *     message="This field cannot be empty (null).",
     * )
     * @Assert\NotBlank(
     *     groups={"form1req", "form4req", "form5req", "formRPreq"},
     *     message="This field cannot be empty (blank).",
     * )
     * @Assert\Length(
     *     groups={"form1req"},
     *     max=16,
     *     maxMessage="The Maximum Length for this field on a Form 1 is {{ limit }} characters.")
     * @Assert\Length(
     *     groups={"form4req"},
     *     max=16,
     *     maxMessage="The Maximum Length for this field on a Form 4 is {{ limit }} characters.")
     * @Assert\Length(
     *     groups={"form5req"},
     *     max=16,
     *     maxMessage="The Maximum Length for this field on a Form 5 is {{ limit }} characters.")
     * @Assert\Length(
     *     groups={"formRPreq"},
     *     max=16,
     *     maxMessage="The Maximum Length for this field on the Responsible Person Question is {{ limit }} characters.")
     * @Assert\Regex(
     *     groups={"form1req", "form4req", "form5req", "formRPreq"},
     *     normalizer="trim",
     *     pattern="^[a-z,A-Z,0-9,\s\\'\-_#,*@]+$/si",
     *     match=false,
     *     message="May only contain common and alphanumeric characters.")
     * @MongoDB\Field(
     *     name="ethnicity",
     *     type="string",
     *     nullable=true)
     */
    private ?string $ethnicity;

    /**
     * 11110
     * @Assert\NotNull(
     *     groups={"form1req", "form4req", "form5req", "formRPreq"},
     *     message="This field cannot be empty (null).",
     * )
     * @Assert\NotBlank(
     *     groups={"form1req", "form4req", "form5req", "formRPreq"},
     *     message="This field cannot be empty (blank).",
     * )
     * @Assert\Length(
     *     groups={"form1req"},
     *     max=16,
     *     maxMessage="The Maximum Length for this field on a Form 1 is {{ limit }} characters.")
     * @Assert\Length(
     *     groups={"form4req"},
     *     max=16,
     *     maxMessage="The Maximum Length for this field on a Form 4 is {{ limit }} characters.")
     * @Assert\Length(
     *     groups={"form5req"},
     *     max=16,
     *     maxMessage="The Maximum Length for this field on a Form 5 is {{ limit }} characters.")
     * @Assert\Length(
     *     groups={"formRPreq"},
     *     max=16,
     *     maxMessage="The Maximum Length for this field on the Responsible Person Question is {{ limit }} characters.")
     * @Assert\Regex(
     *     groups={"form1req", "form4req", "form5req", "formRPreq"},
     *     normalizer="trim",
     *     pattern="^[a-z,A-Z,0-9,\s\\'\-_#,*@]+$/si",
     *     match=false,
     *     message="May only contain common and alphanumeric characters.")
     * @MongoDB\Field(
     *     name="race",
     *     type="string",
     *     nullable=true)
     */
    private ?string $race;

    /**
     * 11120
     * @Assert\NotNull(
     *     groups={"form1req", "form4req", "form5req", "formRPreq"},
     *     message="This field cannot be empty (null).",
     * )
     * @Assert\NotBlank(
     *     groups={"form1req", "form4req", "form5req", "formRPreq"},
     *     message="This field cannot be empty (blank).",
     * )
     * @Assert\Length(
     *     groups={"form1req"},
     *     max=3,
     *     maxMessage="The Maximum Length for this field on a Form 1 is {{ limit }} characters.")
     * @Assert\Length(
     *     groups={"form4req"},
     *     max=3,
     *     maxMessage="The Maximum Length for this field on a Form 4 is {{ limit }} characters.")
     * @Assert\Length(
     *     groups={"form5req"},
     *     max=3,
     *     maxMessage="The Maximum Length for this field on a Form 5 is {{ limit }} characters.")
     * @Assert\Length(
     *     groups={"formRPreq"},
     *     max=3,
     *     maxMessage="The Maximum Length for this field on the Responsible Person Question is {{ limit }} characters.")
     * @Assert\Regex(
     *     groups={"form1req", "form4req", "form5req", "formRPreq"},
     *     normalizer="trim",
     *     pattern="^[a-z,A-Z,0-9,\s\\'\-_#,*@]+$/si",
     *     match=false,
     *     message="May only contain common and alphanumeric characters.")
     * @MongoDB\Field(
     *     name="citizenship_us",
     *     type="string",
     *     nullable=true)
     */
    private ?string $citizenshipUs;

    /**
     * 11130
     * @Assert\NotNull(
     *     groups={"form1req", "form4req", "form5req", "formRPreq"},
     *     message="This field cannot be empty (null).",
     * )
     * @Assert\NotBlank(
     *     groups={"form1req", "form4req", "form5req", "formRPreq"},
     *     message="This field cannot be empty (blank).",
     * )
     * @Assert\Length(
     *     groups={"form1req"},
     *     max=3,
     *     maxMessage="The Maximum Length for this field on a Form 1 is {{ limit }} characters.")
     * @Assert\Length(
     *     groups={"form4req"},
     *     max=3,
     *     maxMessage="The Maximum Length for this field on a Form 4 is {{ limit }} characters.")
     * @Assert\Length(
     *     groups={"form5req"},
     *     max=3,
     *     maxMessage="The Maximum Length for this field on a Form 5 is {{ limit }} characters.")
     * @Assert\Length(
     *     groups={"formRPreq"},
     *     max=3,
     *     maxMessage="The Maximum Length for this field on the Responsible Person Question is {{ limit }} characters.")
     * @Assert\Regex(
     *     groups={"form1req", "form4req", "form5req", "formRPreq"},
     *     normalizer="trim",
     *     pattern="^[a-z,A-Z,0-9,\s\\'\-_#,*@]+$/si",
     *     match=false,
     *     message="May only contain common and alphanumeric characters.")
     * @MongoDB\Field(
     *     name="citizenship_other",
     *     type="string",
     *     nullable=true)
     */
    private ?string $citizenshipOther;

    /**
     * 11140
     * @Assert\NotNull(
     *     groups={"form1req", "form4req", "form5req", "formRPreq"},
     *     message="This field cannot be empty (null).",
     * )
     * @Assert\NotBlank(
     *     groups={"form1req", "form4req", "form5req", "formRPreq"},
     *     message="This field cannot be empty (blank).",
     * )
     * @Assert\Length(
     *     groups={"form1req"},
     *     max=55,
     *     maxMessage="The Maximum Length for this field on a Form 1 is {{ limit }} characters.")
     * @Assert\Length(
     *     groups={"form4req"},
     *     max=48,
     *     maxMessage="The Maximum Length for this field on a Form 4 is {{ limit }} characters.")
     * @Assert\Length(
     *     groups={"form5req"},
     *     max=49,
     *     maxMessage="The Maximum Length for this field on a Form 5 is {{ limit }} characters.")
     * @Assert\Length(
     *     groups={"formRPreq"},
     *     max=54,
     *     maxMessage="The Maximum Length for this field on the Responsible Person Question is {{ limit }} characters.")
     * @Assert\Regex(
     *     groups={"form1req", "form4req", "form5req", "formRPreq"},
     *     normalizer="trim",
     *     pattern="^[a-z,A-Z,0-9,\s\\'\-_#,*@]+$/si",
     *     match=false,
     *     message="May only contain common and alphanumeric characters.")
     * @MongoDB\Field(
     *     name="citizenship",
     *     type="string",
     *     nullable=true)
     */
    private ?string $citizenship;

    /**
     * 11150
     * @Assert\NotNull(
     *     groups={"form1req", "form4req", "form5req", "formRPreq"},
     *     message="This field cannot be empty (null).",
     * )
     * @Assert\NotBlank(
     *     groups={"form1req", "form4req", "form5req", "formRPreq"},
     *     message="This field cannot be empty (blank).",
     * )
     * @Assert\Length(
     *     groups={"form1req"},
     *     max=62,
     *     maxMessage="The Maximum Length for this field on a Form 1 is {{ limit }} characters.")
     * @Assert\Length(
     *     groups={"form4req"},
     *     max=62,
     *     maxMessage="The Maximum Length for this field on a Form 4 is {{ limit }} characters.")
     * @Assert\Length(
     *     groups={"form5req"},
     *     max=62,
     *     maxMessage="The Maximum Length for this field on a Form 5 is {{ limit }} characters.")
     * @Assert\Length(
     *     groups={"formRPreq"},
     *     max=54,
     *     maxMessage="The Maximum Length for this field on the Responsible Person Question is {{ limit }} characters.")
     * @Assert\Regex(
     *     groups={"form1req", "form4req", "form5req", "formRPreq"},
     *     normalizer="trim",
     *     pattern="^[a-z,A-Z,0-9,\s\\'\-_#,*@]+$/si",
     *     match=false,
     *     message="May only contain common and alphanumeric characters.")
     * @MongoDB\Field(
     *     name="state_of_birth",
     *     type="string",
     *     nullable=true)
     */
    private ?string $stateOfBirth;

    /**
     * 11160
     * @Assert\NotNull(
     *     groups={"form1req", "form4req", "form5req", "formRPreq"},
     *     message="This field cannot be empty (null).",
     * )
     * @Assert\NotBlank(
     *     groups={"form1req", "form4req", "form5req", "formRPreq"},
     *     message="This field cannot be empty (blank).",
     * )
     * @Assert\Length(
     *     groups={"form1req"},
     *     max=60,
     *     maxMessage="The Maximum Length for this field on a Form 1 is {{ limit }} characters.")
     * @Assert\Length(
     *     groups={"form4req"},
     *     max=60,
     *     maxMessage="The Maximum Length for this field on a Form 4 is {{ limit }} characters.")
     * @Assert\Length(
     *     groups={"form5req"},
     *     max=56,
     *     maxMessage="The Maximum Length for this field on a Form 5 is {{ limit }} characters.")
     * @Assert\Length(
     *     groups={"formRPreq"},
     *     max=38,
     *     maxMessage="The Maximum Length for this field on the Responsible Person Question is {{ limit }} characters.")
     * @Assert\Regex(
     *     groups={"form1req", "form4req", "form5req", "formRPreq"},
     *     normalizer="trim",
     *     pattern="^[a-z,A-Z,0-9,\s\\'\-_#,*@]+$/si",
     *     match=false,
     *     message="May only contain common and alphanumeric characters.")
     * @MongoDB\Field(
     *     name="country_of_birth",
     *     type="string",
     *     nullable=true)
     */
    private ?string $countryOfBirth;

    /**
     * 11170
     * @Assert\NotNull(
     *     groups={"form1req", "form4req", "form5req", "formRPreq"},
     *     message="This field cannot be empty (null).",
     * )
     * @Assert\NotBlank(
     *     groups={"form1req", "form4req", "form5req", "formRPreq"},
     *     message="This field cannot be empty (blank).",
     * )
     * @Assert\Length(
     *     groups={"form1req"},
     *     max=3,
     *     maxMessage="The Maximum Length for this field on a Form 1 is {{ limit }} characters.")
     * @Assert\Length(
     *     groups={"form4req"},
     *     max=3,
     *     maxMessage="The Maximum Length for this field on a Form 4 is {{ limit }} characters.")
     * @Assert\Length(
     *     groups={"form5req"},
     *     max=3,
     *     maxMessage="The Maximum Length for this field on a Form 5 is {{ limit }} characters.")
     * @Assert\Length(
     *     groups={"formRPreq"},
     *     max=3,
     *     maxMessage="The Maximum Length for this field on the Responsible Person Question is {{ limit }} characters.")
     * @Assert\Regex(
     *     groups={"form1req", "form4req", "form5req", "formRPreq"},
     *     normalizer="trim",
     *     pattern="^[a-z,A-Z,0-9,\s\\'\-_#,*@]+$/si",
     *     match=false,
     *     message="May only contain common and alphanumeric characters.")
     * @MongoDB\Field(
     *     name="renounced",
     *     type="string",
     *     nullable=true)
     */
    private ?string $renounced;

    /**
     * 11180
     * @Assert\NotNull(
     *     groups={"form1req", "form4req", "form5req", "formRPreq"},
     *     message="This field cannot be empty (null).",
     * )
     * @Assert\NotBlank(
     *     groups={"form1req", "form4req", "form5req", "formRPreq"},
     *     message="This field cannot be empty (blank).",
     * )
     * @Assert\Length(
     *     groups={"form1req"},
     *     max=3,
     *     maxMessage="The Maximum Length for this field on a Form 1 is {{ limit }} characters.")
     * @Assert\Length(
     *     groups={"form4req"},
     *     max=3,
     *     maxMessage="The Maximum Length for this field on a Form 4 is {{ limit }} characters.")
     * @Assert\Length(
     *     groups={"form5req"},
     *     max=3,
     *     maxMessage="The Maximum Length for this field on a Form 5 is {{ limit }} characters.")
     * @Assert\Length(
     *     groups={"formRPreq"},
     *     max=3,
     *     maxMessage="The Maximum Length for this field on the Responsible Person Question is {{ limit }} characters.")
     * @Assert\Regex(
     *     groups={"form1req", "form4req", "form5req", "formRPreq"},
     *     normalizer="trim",
     *     pattern="^[a-z,A-Z,0-9,\s\\'\-_#,*@]+$/si",
     *     match=false,
     *     message="May only contain common and alphanumeric characters.")
     * @MongoDB\Field(
     *     name="illegal_alien",
     *     type="string",
     *     nullable=true)
     */
    private ?string $illegalAlien;

    /**
     * 11190
     * @Assert\NotNull(
     *     groups={"form1req", "form4req", "form5req", "formRPreq"},
     *     message="This field cannot be empty (null).",
     * )
     * @Assert\NotBlank(
     *     groups={"form1req", "form4req", "form5req", "formRPreq"},
     *     message="This field cannot be empty (blank).",
     * )
     * @Assert\Length(
     *     groups={"form1req"},
     *     max=3,
     *     maxMessage="The Maximum Length for this field on a Form 1 is {{ limit }} characters.")
     * @Assert\Length(
     *     groups={"form4req"},
     *     max=3,
     *     maxMessage="The Maximum Length for this field on a Form 4 is {{ limit }} characters.")
     * @Assert\Length(
     *     groups={"form5req"},
     *     max=3,
     *     maxMessage="The Maximum Length for this field on a Form 5 is {{ limit }} characters.")
     * @Assert\Length(
     *     groups={"formRPreq"},
     *     max=3,
     *     maxMessage="The Maximum Length for this field on the Responsible Person Question is {{ limit }} characters.")
     * @Assert\Regex(
     *     groups={"form1req", "form4req", "form5req", "formRPreq"},
     *     normalizer="trim",
     *     pattern="^[a-z,A-Z,0-9,\s\\'\-_#,*@]+$/si",
     *     match=false,
     *     message="May only contain common and alphanumeric characters.")
     * @MongoDB\Field(
     *     name="resident_alien",
     *     type="string",
     *     nullable=true)
     */
    private ?string $residentAlien;

    /**
     * 11200
     * @Assert\NotNull(
     *     groups={"form1req", "form4req", "form5req", "formRPreq"},
     *     message="This field cannot be empty (null).",
     * )
     * @Assert\NotBlank(
     *     groups={"form1req", "form4req", "form5req", "formRPreq"},
     *     message="This field cannot be empty (blank).",
     * )
     * @Assert\Length(
     *     groups={"form1req"},
     *     max=3,
     *     maxMessage="The Maximum Length for this field on a Form 1 is {{ limit }} characters.")
     * @Assert\Length(
     *     groups={"form4req"},
     *     max=3,
     *     maxMessage="The Maximum Length for this field on a Form 4 is {{ limit }} characters.")
     * @Assert\Length(
     *     groups={"form5req"},
     *     max=3,
     *     maxMessage="The Maximum Length for this field on a Form 5 is {{ limit }} characters.")
     * @Assert\Length(
     *     groups={"formRPreq"},
     *     max=3,
     *     maxMessage="The Maximum Length for this field on the Responsible Person Question is {{ limit }} characters.")
     * @Assert\Regex(
     *     groups={"form1req", "form4req", "form5req", "formRPreq"},
     *     normalizer="trim",
     *     pattern="^[a-z,A-Z,0-9,\s\\'\-_#,*@]+$/si",
     *     match=false,
     *     message="May only contain common and alphanumeric characters.")
     * @MongoDB\Field(
     *     name="resident_alien_exception",
     *     type="string",
     *     nullable=true)
     */
    private ?string $residentAlienException;

    /**private
     * 11210
     * @Assert\NotNull(
     *     groups={"form1req", "form4req", "form5req", "formRPreq"},
     *     message="This field cannot be empty (null).",
     * )
     * @Assert\NotBlank(
     *     groups={"form1req", "form4req", "form5req", "formRPreq"},
     *     message="This field cannot be empty (blank).",
     * )
     * @Assert\Length(
     *     groups={"form1req"},
     *     max=50,
     *     maxMessage="The Maximum Length for this field on a Form 1 is {{ limit }} characters.")
     * @Assert\Length(
     *     groups={"form4req"},
     *     max=50,
     *     maxMessage="The Maximum Length for this field on a Form 4 is {{ limit }} characters.")
     * @Assert\Length(
     *     groups={"form5req"},
     *     max=55,
     *     maxMessage="The Maximum Length for this field on a Form 5 is {{ limit }} characters.")
     * @Assert\Length(
     *     groups={"formRPreq"},
     *     max=54,
     *     maxMessage="The Maximum Length for this field on the Responsible Person Question is {{ limit }} characters.")
     * @Assert\Regex(
     *     groups={"form1req", "form4req", "form5req", "formRPreq"},
     *     normalizer="trim",
     *     pattern="^[a-z,A-Z,0-9,\s\\'\-_#,*@]+$/si",
     *     match=false,
     *     message="May only contain common and alphanumeric characters.")
     * @MongoDB\Field(
     *     name="admission_number",
     *     type="string",
     *     nullable=true)
     */
    private ?string $admissionNumber;

    /**
     * 11220
     * @Assert\NotNull(
     *     groups={"form1req", "form4req", "form5req", "formRPreq"},
     *     message="This field cannot be empty (null).",
     * )
     * @Assert\NotBlank(
     *     groups={"form1req", "form4req", "form5req", "formRPreq"},
     *     message="This field cannot be empty (blank).",
     * )
     * @Assert\Length(
     *     groups={"form1req"},
     *     max=3,
     *     maxMessage="The Maximum Length for this field on a Form 1 is {{ limit }} characters.")
     * @Assert\Length(
     *     groups={"form4req"},
     *     max=3,
     *     maxMessage="The Maximum Length for this field on a Form 4 is {{ limit }} characters.")
     * @Assert\Length(
     *     groups={"form5req"},
     *     max=3,
     *     maxMessage="The Maximum Length for this field on a Form 5 is {{ limit }} characters.")
     * @Assert\Length(
     *     groups={"formRPreq"},
     *     max=3,
     *     maxMessage="The Maximum Length for this field on the Responsible Person Question is {{ limit }} characters.")
     * @Assert\Regex(
     *     groups={"form1req", "form4req", "form5req", "formRPreq"},
     *     normalizer="trim",
     *     pattern="^[a-z,A-Z,0-9,\s\\'\-_#,*@]+$/si",
     *     match=false,
     *     message="May only contain common and alphanumeric characters.")
     * @MongoDB\Field(
     *     name="has_upin",
     *     type="string",
     *     nullable=true)
     */
    private ?string $hasUPIN;

    /**
     * 11220
     * @Assert\NotNull(
     *     groups={"form1req", "form4req", "form5req", "formRPreq"},
     *     message="This field cannot be empty (null).",
     * )
     * @Assert\NotBlank(
     *     groups={"form1req", "form4req", "form5req", "formRPreq"},
     *     message="This field cannot be empty (blank).",
     * )
     * @Assert\Length(
     *     groups={"form1req"},
     *     max=28,
     *     maxMessage="The Maximum Length for this field on a Form 1 is {{ limit }} characters.")
     * @Assert\Length(
     *     groups={"form4req"},
     *     max=27,
     *     maxMessage="The Maximum Length for this field on a Form 4 is {{ limit }} characters.")
     * @Assert\Length(
     *     groups={"form5req"},
     *     max=23,
     *     maxMessage="The Maximum Length for this field on a Form 5 is {{ limit }} characters.")
     * @Assert\Length(
     *     groups={"formRPreq"},
     *     max=31,
     *     maxMessage="The Maximum Length for this field on the Responsible Person Question is {{ limit }} characters.")
     * @Assert\Regex(
     *     groups={"form1req", "form4req", "form5req", "formRPreq"},
     *     normalizer="trim",
     *     pattern="^[a-z,A-Z,0-9,\s\\'\-_#,*@]+$/si",
     *     match=false,
     *     message="May only contain common and alphanumeric characters.")
     * @MongoDB\Field(
     *     name="upin",
     *     type="string",
     *     nullable=true)
     */
    private ?string $upin;

    /**
     * 12000
     * @Assert\NotNull(
     *     groups={"form1req", "form4req", "form5req", "formRPreq"},
     *     message="This field cannot be empty (null).",
     * )
     * @Assert\NotBlank(
     *     groups={"form1req", "form4req", "form5req", "formRPreq"},
     *     message="This field cannot be empty (blank).",
     * )
     * @Assert\Length(
     *     groups={"form1req"},
     *     max=10,
     *     maxMessage="The Maximum Length for this field on a Form 1 is {{ limit }} characters.")
     * @Assert\Length(
     *     groups={"form4req"},
     *     max=10,
     *     maxMessage="The Maximum Length for this field on a Form 4 is {{ limit }} characters.")
     * @Assert\Length(
     *     groups={"form5req"},
     *     max=10,
     *     maxMessage="The Maximum Length for this field on a Form 5 is {{ limit }} characters.")
     * @Assert\Length(
     *     groups={"formRPreq"},
     *     max=10,
     *     maxMessage="The Maximum Length for this field on the Responsible Person Question is {{ limit }} characters.")
     * @Assert\Regex(
     *     groups={"form1req", "form4req", "form5req", "formRPreq"},
     *     normalizer="trim",
     *     pattern="^[a-z,A-Z,0-9,\s\\'\-_#,*@]+$/si",
     *     match=false,
     *     message="May only contain common and alphanumeric characters.")
     * @MongoDB\Field(
     *     name="date_signed",
     *     type="date",
     *     nullable=true)
     */
    private ?Datetime $dateSigned;

    public function getA(): ?string
    {
        return $this->a;
    }

    public function setA(?string $a): void
    {
        $this->a = $a;
    }

    public function getAdmissionNumber(): ?string
    {
        return $this->admissionNumber;
    }

    public function setAdmissionNumber(?string $admissionNumber): void
    {
        $this->admissionNumber = $admissionNumber;
    }

    public function getAlternateAddress(): ?string
    {
        return $this->alternateAddress;
    }

    public function setAlternateAddress(?string $alternateAddress): void
    {
        $this->alternateAddress = $alternateAddress;
    }

    public function getB(): ?string
    {
        return $this->b;
    }

    public function setB(?string $b): void
    {
        $this->b = $b;
    }

    public function getC(): ?string
    {
        return $this->c;
    }

    public function setC(?string $c): void
    {
        $this->c = $c;
    }

    public function getCaliber(): ?string
    {
        return $this->caliber;
    }

    public function setCaliber(?string $caliber): void
    {
        $this->caliber = $caliber;
    }

    public function getCaliberUnit(): ?string
    {
        return $this->caliberUnit;
    }

    public function setCaliberUnit(?string $caliberUnit): void
    {
        $this->caliberUnit = $caliberUnit;
    }

    public function getCitizenship(): ?string
    {
        return $this->citizenship;
    }

    public function setCitizenship(?string $citizenship): void
    {
        $this->citizenship = $citizenship;
    }

    public function getCitizenshipOther(): ?string
    {
        return $this->citizenshipOther;
    }

    public function setCitizenshipOther(?string $citizenshipOther): void
    {
        $this->citizenshipOther = $citizenshipOther;
    }

    public function getCitizenshipUs(): ?string
    {
        return $this->citizenshipUs;
    }

    public function setCitizenshipUs(?string $citizenshipUs): void
    {
        $this->citizenshipUs = $citizenshipUs;
    }

    public function getCloAgency(): ?string
    {
        return $this->cloAgency;
    }

    public function setCloAgency(?string $cloAgency): void
    {
        $this->cloAgency = $cloAgency;
    }

    public function getCloCity(): ?string
    {
        return $this->cloCity;
    }

    public function setCloCity(?string $cloCity): void
    {
        $this->cloCity = $cloCity;
    }

    public function getCloLine1(): ?string
    {
        return $this->cloLine1;
    }

    public function setCloLine1(?string $cloLine1): void
    {
        $this->cloLine1 = $cloLine1;
    }

    public function getCloName(): ?string
    {
        return $this->cloName;
    }

    public function setCloName(?string $cloName): void
    {
        $this->cloName = $cloName;
    }

    public function getCloState(): ?string
    {
        return $this->cloState;
    }

    public function setCloState(?string $cloState): void
    {
        $this->cloState = $cloState;
    }

    public function getCloTitle(): ?string
    {
        return $this->cloTitle;
    }

    public function setCloTitle(?string $cloTitle): void
    {
        $this->cloTitle = $cloTitle;
    }

    public function getCloZipcode(): ?string
    {
        return $this->cloZipcode;
    }

    public function setCloZipcode(?string $cloZipcode): void
    {
        $this->cloZipcode = $cloZipcode;
    }

    public function getCountryOfBirth(): ?string
    {
        return $this->countryOfBirth;
    }

    public function setCountryOfBirth(?string $countryOfBirth): void
    {
        $this->countryOfBirth = $countryOfBirth;
    }

    public function getD(): ?string
    {
        return $this->d;
    }

    public function setD(?string $d): void
    {
        $this->d = $d;
    }

    public function getDateCompleted(): ?DateTime
    {
        return $this->dateCompleted;
    }

    public function setDateCompleted(?DateTime $dateCompleted): void
    {
        $this->dateCompleted = $dateCompleted;
    }

    public function getDateOfBirth(): ?DateTime
    {
        return $this->dateOfBirth;
    }

    public function setDateOfBirth(?DateTime $dateOfBirth): void
    {
        $this->dateOfBirth = $dateOfBirth;
    }

    public function getDateSigned(): ?DateTime
    {
        return $this->dateSigned;
    }

    public function setDateSigned(?DateTime $dateSigned): void
    {
        $this->dateSigned = $dateSigned;
    }

    public function getDateStarted(): ?DateTime
    {
        return $this->dateStarted;
    }

    public function setDateStarted(?DateTime $dateStarted): void
    {
        $this->dateStarted = $dateStarted;
    }

    public function getDdExplosive(): ?string
    {
        return $this->ddExplosive;
    }

    public function setDdExplosive(?string $ddExplosive): void
    {
        $this->ddExplosive = $ddExplosive;
    }

    public function getDdType(): ?string
    {
        return $this->ddType;
    }

    public function setDdType(?string $ddType): void
    {
        $this->ddType = $ddType;
    }

    public function getDecedentDetails(): ?string
    {
        return $this->decedentDetails;
    }

    public function setDecedentDetails(?string $decedentDetails): void
    {
        $this->decedentDetails = $decedentDetails;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): void
    {
        $this->description = $description;
    }

    public function getE(): ?string
    {
        return $this->e;
    }

    public function setE(?string $e): void
    {
        $this->e = $e;
    }

    public function getEthnicity(): ?string
    {
        return $this->ethnicity;
    }

    public function setEthnicity(?string $ethnicity): void
    {
        $this->ethnicity = $ethnicity;
    }

    public function getF(): ?string
    {
        return $this->f;
    }

    public function setF(?string $f): void
    {
        $this->f = $f;
    }

    public function getFirearmReactivated(): ?string
    {
        return $this->firearmReactivated;
    }

    public function setFirearmReactivated(?string $firearmReactivated): void
    {
        $this->firearmReactivated = $firearmReactivated;
    }

    public function getFirearmType(): ?string
    {
        return $this->firearmType;
    }

    public function setFirearmType(?string $firearmType): void
    {
        $this->firearmType = $firearmType;
    }

    public function getFormId(): ?int
    {
        return $this->formId;
    }

    public function setFormId(?int $formId): void
    {
        $this->formId = $formId;
    }

    public function getFormName(): ?string
    {
        return $this->formName;
    }

    public function setFormName(?string $formName): void
    {
        $this->formName = $formName;
    }

    public function getG(): ?string
    {
        return $this->g;
    }

    public function setG(?string $g): void
    {
        $this->g = $g;
    }

    public function getH(): ?string
    {
        return $this->h;
    }

    public function setH(?string $h): void
    {
        $this->h = $h;
    }

    public function getHasUPIN(): ?string
    {
        return $this->hasUPIN;
    }

    public function setHasUPIN(?string $hasUPIN): void
    {
        $this->hasUPIN = $hasUPIN;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getIllegalAlien(): ?string
    {
        return $this->illegalAlien;
    }

    public function setIllegalAlien(?string $illegalAlien): void
    {
        $this->illegalAlien = $illegalAlien;
    }

    public function getLengthBarrel(): ?string
    {
        return $this->lengthBarrel;
    }

    public function setLengthBarrel(?string $lengthBarrel): void
    {
        $this->lengthBarrel = $lengthBarrel;
    }

    public function getLengthOverall(): ?string
    {
        return $this->lengthOverall;
    }

    public function setLengthOverall(?string $lengthOverall): void
    {
        $this->lengthOverall = $lengthOverall;
    }

    public function getManufactureCity(): ?string
    {
        return $this->manufactureCity;
    }

    public function setManufactureCity(?string $manufactureCity): void
    {
        $this->manufactureCity = $manufactureCity;
    }

    public function getManufactureLine1(): ?string
    {
        return $this->manufactureLine1;
    }

    public function setManufactureLine1(?string $manufactureLine1): void
    {
        $this->manufactureLine1 = $manufactureLine1;
    }

    public function getManufactureLine2(): ?string
    {
        return $this->manufactureLine2;
    }

    public function setManufactureLine2(?string $manufactureLine2): void
    {
        $this->manufactureLine2 = $manufactureLine2;
    }

    public function getManufactureName(): ?string
    {
        return $this->manufactureName;
    }

    public function setManufactureName(?string $manufactureName): void
    {
        $this->manufactureName = $manufactureName;
    }

    public function getManufactureState(): ?string
    {
        return $this->manufactureState;
    }

    public function setManufactureState(?string $manufactureState): void
    {
        $this->manufactureState = $manufactureState;
    }

    public function getManufactureZipcode(): ?string
    {
        return $this->manufactureZipcode;
    }

    public function setManufactureZipcode(?string $manufactureZipcode): void
    {
        $this->manufactureZipcode = $manufactureZipcode;
    }

    public function getModel(): ?string
    {
        return $this->model;
    }

    public function setModel(?string $model): void
    {
        $this->model = $model;
    }

    public function getOmbFormId(): ?string
    {
        return $this->ombFormId;
    }

    public function setOmbFormId(?string $ombFormId): void
    {
        $this->ombFormId = $ombFormId;
    }

    public function getParentFormId(): ?int
    {
        return $this->parentFormId;
    }

    public function setParentFormId(?int $parentFormId): void
    {
        $this->parentFormId = $parentFormId;
    }

    public function getRace(): ?string
    {
        return $this->race;
    }

    public function setRace(?string $race): void
    {
        $this->race = $race;
    }

    public function getRenderedUnserviceable(): ?string
    {
        return $this->renderedUnserviceable;
    }

    public function setRenderedUnserviceable(?string $renderedUnserviceable
    ): void {
        $this->renderedUnserviceable = $renderedUnserviceable;
    }

    public function getRenounced(): ?string
    {
        return $this->renounced;
    }

    public function setRenounced(?string $renounced): void
    {
        $this->renounced = $renounced;
    }

    public function getResidentAlien(): ?string
    {
        return $this->residentAlien;
    }

    public function setResidentAlien(?string $residentAlien): void
    {
        $this->residentAlien = $residentAlien;
    }

    public function getResidentAlienException(): ?string
    {
        return $this->residentAlienException;
    }

    public function setResidentAlienException(?string $residentAlienException
    ): void {
        $this->residentAlienException = $residentAlienException;
    }

    public function getRpAlias(): ?string
    {
        return $this->rpAlias;
    }

    public function setRpAlias(?string $rpAlias): void
    {
        $this->rpAlias = $rpAlias;
    }

    public function getRpCity(): ?string
    {
        return $this->rpCity;
    }

    public function setRpCity(?string $rpCity): void
    {
        $this->rpCity = $rpCity;
    }

    public function getRpEmail(): ?string
    {
        return $this->rpEmail;
    }

    public function setRpEmail(?string $rpEmail): void
    {
        $this->rpEmail = $rpEmail;
    }

    public function getRpEmail1(): ?string
    {
        return $this->rpEmail1;
    }

    public function setRpEmail1(?string $rpEmail1): void
    {
        $this->rpEmail1 = $rpEmail1;
    }

    public function getRpEmail2(): ?string
    {
        return $this->rpEmail2;
    }

    public function setRpEmail2(?string $rpEmail2): void
    {
        $this->rpEmail2 = $rpEmail2;
    }

    public function getRpEmail3(): ?string
    {
        return $this->rpEmail3;
    }

    public function setRpEmail3(?string $rpEmail3): void
    {
        $this->rpEmail3 = $rpEmail3;
    }

    public function getRpEmail4(): ?string
    {
        return $this->rpEmail4;
    }

    public function setRpEmail4(?string $rpEmail4): void
    {
        $this->rpEmail4 = $rpEmail4;
    }

    public function getRpEmail5(): ?string
    {
        return $this->rpEmail5;
    }

    public function setRpEmail5(?string $rpEmail5): void
    {
        $this->rpEmail5 = $rpEmail5;
    }

    public function getRpEmail6(): ?string
    {
        return $this->rpEmail6;
    }

    public function setRpEmail6(?string $rpEmail6): void
    {
        $this->rpEmail6 = $rpEmail6;
    }

    public function getRpEmail7(): ?string
    {
        return $this->rpEmail7;
    }

    public function setRpEmail7(?string $rpEmail7): void
    {
        $this->rpEmail7 = $rpEmail7;
    }

    public function getRpEmail8(): ?string
    {
        return $this->rpEmail8;
    }

    public function setRpEmail8(?string $rpEmail8): void
    {
        $this->rpEmail8 = $rpEmail8;
    }

    public function getRpLine1(): ?string
    {
        return $this->rpLine1;
    }

    public function setRpLine1(?string $rpLine1): void
    {
        $this->rpLine1 = $rpLine1;
    }

    public function getRpLine2(): ?string
    {
        return $this->rpLine2;
    }

    public function setRpLine2(?string $rpLine2): void
    {
        $this->rpLine2 = $rpLine2;
    }

    public function getRpName(): ?string
    {
        return $this->rpName;
    }

    public function setRpName(?string $rpName): void
    {
        $this->rpName = $rpName;
    }

    public function getRpName1(): ?string
    {
        return $this->rpName1;
    }

    public function setRpName1(?string $rpName1): void
    {
        $this->rpName1 = $rpName1;
    }

    public function getRpName2(): ?string
    {
        return $this->rpName2;
    }

    public function setRpName2(?string $rpName2): void
    {
        $this->rpName2 = $rpName2;
    }

    public function getRpName3(): ?string
    {
        return $this->rpName3;
    }

    public function setRpName3(?string $rpName3): void
    {
        $this->rpName3 = $rpName3;
    }

    public function getRpName4(): ?string
    {
        return $this->rpName4;
    }

    public function setRpName4(?string $rpName4): void
    {
        $this->rpName4 = $rpName4;
    }

    public function getRpName5(): ?string
    {
        return $this->rpName5;
    }

    public function setRpName5(?string $rpName5): void
    {
        $this->rpName5 = $rpName5;
    }

    public function getRpName6(): ?string
    {
        return $this->rpName6;
    }

    public function setRpName6(?string $rpName6): void
    {
        $this->rpName6 = $rpName6;
    }

    public function getRpName7(): ?string
    {
        return $this->rpName7;
    }

    public function setRpName7(?string $rpName7): void
    {
        $this->rpName7 = $rpName7;
    }

    public function getRpName8(): ?string
    {
        return $this->rpName8;
    }

    public function setRpName8(?string $rpName8): void
    {
        $this->rpName8 = $rpName8;
    }

    public function getRpPhone(): ?string
    {
        return $this->rpPhone;
    }

    public function setRpPhone(?string $rpPhone): void
    {
        $this->rpPhone = $rpPhone;
    }

    public function getRpQuantity(): ?int
    {
        return $this->rpQuantity;
    }

    public function setRpQuantity(?int $rpQuantity): void
    {
        $this->rpQuantity = $rpQuantity;
    }

    public function getRpState(): ?string
    {
        return $this->rpState;
    }

    public function setRpState(?string $rpState): void
    {
        $this->rpState = $rpState;
    }

    public function getRpZipcode(): ?string
    {
        return $this->rpZipcode;
    }

    public function setRpZipcode(?string $rpZipcode): void
    {
        $this->rpZipcode = $rpZipcode;
    }

    public function getSerialNo(): ?string
    {
        return $this->serialNo;
    }

    public function setSerialNo(?string $serialNo): void
    {
        $this->serialNo = $serialNo;
    }

    public function getSsn(): ?string
    {
        return $this->ssn;
    }

    public function setSsn(?string $ssn): void
    {
        $this->ssn = $ssn;
    }

    public function getStateOfBirth(): ?string
    {
        return $this->stateOfBirth;
    }

    public function setStateOfBirth(?string $stateOfBirth): void
    {
        $this->stateOfBirth = $stateOfBirth;
    }

    public function getStatementNameTitle(): ?string
    {
        return $this->statementNameTitle;
    }

    public function setStatementNameTitle(?string $statementNameTitle): void
    {
        $this->statementNameTitle = $statementNameTitle;
    }

    public function getStatementPurpose(): ?string
    {
        return $this->statementPurpose;
    }

    public function setStatementPurpose(?string $statementPurpose): void
    {
        $this->statementPurpose = $statementPurpose;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(?string $status): void
    {
        $this->status = $status;
    }

    public function getTransfereeCity(): ?string
    {
        return $this->transfereeCity;
    }

    public function setTransfereeCity(?string $transfereeCity): void
    {
        $this->transfereeCity = $transfereeCity;
    }

    public function getTransfereeClass(): ?string
    {
        return $this->transfereeClass;
    }

    public function setTransfereeClass(?string $transfereeClass): void
    {
        $this->transfereeClass = $transfereeClass;
    }

    public function getTransfereeCounty(): ?string
    {
        return $this->transfereeCounty;
    }

    public function setTransfereeCounty(?string $transfereeCounty): void
    {
        $this->transfereeCounty = $transfereeCounty;
    }

    public function getTransfereeDateSigned(): ?DateTime
    {
        return $this->transfereeDateSigned;
    }

    public function setTransfereeDateSigned(?DateTime $transfereeDateSigned
    ): void {
        $this->transfereeDateSigned = $transfereeDateSigned;
    }

    public function getTransfereeEin(): ?string
    {
        return $this->transfereeEin;
    }

    public function setTransfereeEin(?string $transfereeEin): void
    {
        $this->transfereeEin = $transfereeEin;
    }

    public function getTransfereeEmail(): ?string
    {
        return $this->transfereeEmail;
    }

    public function setTransfereeEmail(?string $transfereeEmail): void
    {
        $this->transfereeEmail = $transfereeEmail;
    }

    public function getTransfereeFfl1(): ?string
    {
        return $this->transfereeFfl1;
    }

    public function setTransfereeFfl1(?string $transfereeFfl1): void
    {
        $this->transfereeFfl1 = $transfereeFfl1;
    }

    public function getTransfereeFfl2(): ?string
    {
        return $this->transfereeFfl2;
    }

    public function setTransfereeFfl2(?string $transfereeFfl2): void
    {
        $this->transfereeFfl2 = $transfereeFfl2;
    }

    public function getTransfereeFfl3(): ?string
    {
        return $this->transfereeFfl3;
    }

    public function setTransfereeFfl3(?string $transfereeFfl3): void
    {
        $this->transfereeFfl3 = $transfereeFfl3;
    }

    public function getTransfereeFfl4(): ?string
    {
        return $this->transfereeFfl4;
    }

    public function setTransfereeFfl4(?string $transfereeFfl4): void
    {
        $this->transfereeFfl4 = $transfereeFfl4;
    }

    public function getTransfereeLine1(): ?string
    {
        return $this->transfereeLine1;
    }

    public function setTransfereeLine1(?string $transfereeLine1): void
    {
        $this->transfereeLine1 = $transfereeLine1;
    }

    public function getTransfereeLine2(): ?string
    {
        return $this->transfereeLine2;
    }

    public function setTransfereeLine2(?string $transfereeLine2): void
    {
        $this->transfereeLine2 = $transfereeLine2;
    }

    public function getTransfereeName(): ?string
    {
        return $this->transfereeName;
    }

    public function setTransfereeName(?string $transfereeName): void
    {
        $this->transfereeName = $transfereeName;
    }

    public function getTransfereePhone(): ?string
    {
        return $this->transfereePhone;
    }

    public function setTransfereePhone(?string $transfereePhone): void
    {
        $this->transfereePhone = $transfereePhone;
    }

    public function getTransfereeState(): ?string
    {
        return $this->transfereeState;
    }

    public function setTransfereeState(?string $transfereeState): void
    {
        $this->transfereeState = $transfereeState;
    }

    public function getApplicantTitle(): ?string
    {
        return $this->applicantTitle;
    }

    public function setApplilcantTitle(?string $applicantTitle): void
    {
        $this->applicantTitle = $applicantTitle;
    }

    public function getTransfereeTradeName(): ?string
    {
        return $this->transfereeTradeName;
    }

    public function setTransfereeTradeName(?string $transfereeTradeName): void
    {
        $this->transfereeTradeName = $transfereeTradeName;
    }

    public function getTransfereeZipcode(): ?string
    {
        return $this->transfereeZipcode;
    }

    public function setTransfereeZipcode(?string $transfereeZipcode): void
    {
        $this->transfereeZipcode = $transfereeZipcode;
    }

    public function getTransferorCity(): ?string
    {
        return $this->transferorCity;
    }

    public function setTransferorCity(?string $transferorCity): void
    {
        $this->transferorCity = $transferorCity;
    }

    public function getTransferorClass(): ?string
    {
        return $this->transferorClass;
    }

    public function setTransferorClass(?string $transferorClass): void
    {
        $this->transferorClass = $transferorClass;
    }

    public function getTransferorDateSigned(): ?DateTime
    {
        return $this->transferorDateSigned;
    }

    public function setTransferorDateSigned(?DateTime $transferorDateSigned
    ): void {
        $this->transferorDateSigned = $transferorDateSigned;
    }

    public function getTransferorEin(): ?string
    {
        return $this->transferorEin;
    }

    public function setTransferorEin(?string $transferorEin): void
    {
        $this->transferorEin = $transferorEin;
    }

    public function getTransferorEmail(): ?string
    {
        return $this->transferorEmail;
    }

    public function setTransferorEmail(?string $transferorEmail): void
    {
        $this->transferorEmail = $transferorEmail;
    }

    public function getTransferorFfl1(): ?string
    {
        return $this->transferorFfl1;
    }

    public function setTransferorFfl1(?string $transferorFfl1): void
    {
        $this->transferorFfl1 = $transferorFfl1;
    }

    public function getTransferorFfl2(): ?string
    {
        return $this->transferorFfl2;
    }

    public function setTransferorFfl2(?string $transferorFfl2): void
    {
        $this->transferorFfl2 = $transferorFfl2;
    }

    public function getTransferorFfl3(): ?string
    {
        return $this->transferorFfl3;
    }

    public function setTransferorFfl3(?string $transferorFfl3): void
    {
        $this->transferorFfl3 = $transferorFfl3;
    }

    public function getTransferorFfl4(): ?string
    {
        return $this->transferorFfl4;
    }

    public function setTransferorFfl4(?string $transferorFfl4): void
    {
        $this->transferorFfl4 = $transferorFfl4;
    }

    public function getTransferorLine1(): ?string
    {
        return $this->transferorLine1;
    }

    public function setTransferorLine1(?string $transferorLine1): void
    {
        $this->transferorLine1 = $transferorLine1;
    }

    public function getTransferorLine2(): ?string
    {
        return $this->transferorLine2;
    }

    public function setTransferorLine2(?string $transferorLine2): void
    {
        $this->transferorLine2 = $transferorLine2;
    }

    public function getTransferorName(): ?string
    {
        return $this->transferorName;
    }

    public function setTransferorName(?string $transferorName): void
    {
        $this->transferorName = $transferorName;
    }

    public function getTransferorNameAndTitle(): ?string
    {
        return $this->transferorNameAndTitle;
    }

    public function setTransferorNameAndTitle(?string $transferorNameAndTitle
    ): void {
        $this->transferorNameAndTitle = $transferorNameAndTitle;
    }

    public function getTransferorPhone(): ?string
    {
        return $this->transferorPhone;
    }

    public function setTransferorPhone(?string $transferorPhone): void
    {
        $this->transferorPhone = $transferorPhone;
    }

    public function getTransferorState(): ?string
    {
        return $this->transferorState;
    }

    public function setTransferorState(?string $transferorState): void
    {
        $this->transferorState = $transferorState;
    }

    public function getTransferorTitle(): ?string
    {
        return $this->transferorTitle;
    }

    public function setTransferorTitle(?string $transferorTitle): void
    {
        $this->transferorTitle = $transferorTitle;
    }

    public function getTransferorZipcode(): ?string
    {
        return $this->transferorZipcode;
    }

    public function setTransferorZipcode(?string $transferorZipcode): void
    {
        $this->transferorZipcode = $transferorZipcode;
    }

    public function getTypeApplication(): ?string
    {
        return $this->typeApplication;
    }

    public function setTypeApplication(?string $typeApplication): void
    {
        $this->typeApplication = $typeApplication;
    }

    public function getTypeForm(): ?string
    {
        return $this->typeForm;
    }

    public function setTypeForm(?string $typeForm): void
    {
        $this->typeForm = $typeForm;
    }

    public function getTypeTransfer(): ?string
    {
        return $this->typeTransfer;
    }

    public function setTypeTransfer(?string $typeTransfer): void
    {
        $this->typeTransfer = $typeTransfer;
    }

    public function getTypeTransferee(): ?string
    {
        return $this->typeTransferee;
    }

    public function setTypeTransferee(?string $typeTransferee): void
    {
        $this->typeTransferee = $typeTransferee;
    }

    public function getUpin(): ?string
    {
        return $this->upin;
    }

    public function setUpin(?string $upin): void
    {
        $this->upin = $upin;
    }

    public function getUserAction(): ?string
    {
        return $this->userAction;
    }

    public function setUserAction(?string $userAction): void
    {
        $this->userAction = $userAction;
    }

    public function getUserRole(): ?string
    {
        return $this->userRole;
    }

    public function setUserRole(?string $userRole): void
    {
        $this->userRole = $userRole;
    }

}