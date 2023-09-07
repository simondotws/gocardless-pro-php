<?php
/**
 * WARNING: Do not edit by hand, this file was generated by Crank:
 *
 * https://github.com/gocardless/crank
 */

namespace GoCardlessPro\Resources;

/**
 * A thin wrapper around a mandate_import, providing access to its
 * attributes
 *
 * @property-read $created_at
 * @property-read $id
 * @property-read $links
 * @property-read $scheme
 * @property-read $status
 */
class MandateImport extends BaseResource
{
    protected $model_name = "MandateImport";

    /**
     * Fixed [timestamp](#api-usage-time-zones--dates), recording when this
     * resource was created.
     */
    protected $created_at;

    /**
     * Unique identifier, beginning with "IM".
     */
    protected $id;

    /**
     * Related resources
     */
    protected $links;

    /**
     * The scheme of the mandates to be imported.<br>All mandates in a single
     * mandate
     * import must be for the same scheme.
     */
    protected $scheme;

    /**
     * The status of the mandate import.
     * <ul>
     * <li>`created`: A new mandate import.</li>
     * <li>`submitted`: After the integrator has finished adding mandates and <a
     * href="#mandate-imports-submit-a-mandate-import">submitted</a> the
     * import.</li>
     * <li>`cancelled`: If the integrator <a
     * href="#mandate-imports-cancel-a-mandate-import">cancelled</a> the mandate
     * import.</li>
     * <li>`processing`: Once a mandate import has been approved by a GoCardless
     * team member it will be in this state while mandates are imported.</li>
     * <li>`processed`: When all mandates have been imported successfully.</li>
     * </ul>
     */
    protected $status;

}
