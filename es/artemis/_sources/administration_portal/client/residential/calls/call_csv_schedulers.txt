*******************
Call CSV schedulers
*******************

This section allows programming automatic periodical CSV reports to residential client administrators.

.. note:: This section is almost identical to :ref:`Invoice schedulers` except to the
          fields that do not apply to CSVs (Invoice number sequence, Tax rate...)

When adding a new definition, these fields are shown:

.. glossary::

    Name
        Name of the scheduled Call CSV

    Email
        Send generated Call CSV via email. Empty if no automatic mail is wanted.

    Frequency/Unit
        Defines the frequency (once a month, every 7 days, etc.) of the programmed task

    Direction
        Defines which calls should be included attending to its direction (inbound, outbound, both).

    DDI
        Allows selecting client's one specific DDI.

    Endpoint type
        Allows selecting one specific endpoint type between: residential device and fax.

    Residential device
        Only for *Endpoint type: residential*, allows selecting one specific residential device.

    Fax
        Only for *Endpoint type: fax*, allows selecting one specific fax.


Once created, some new fields and subsections are accesible:

.. glossary::

    Next execution
        Shows next execution date

    Last execution
        Shows last execution and its result.


.. tip:: Modifying *Next execution* value allows forcing specific runs. For example, setting *Next execution* to
         current month's first day will create again last month's CSV report (for a monthly scheduler).


Generated CSVs of each scheduler can be accessed in **List of Call CSV reports** subsection.


CSV fields
==========

These are the fields of the generated CSV files:

.. glossary::

    callid
        Call-ID of the SIP dialog

    startTime
        Time and date of the call establishment

    duration
        Call duration in seconds

    caller
        Caller number in E.164 format (with '+')

    callee
        Callee number in E.164 format (with '+')

    price
        Calculated price for the given call (empty if *Display billing details to client* is disabled)

    direction
        Possible values: inbound, outbound.

    ddiId
        Client DDI to which call will be assigned (callee for inbound calls, caller for outbound calls).

    endpointType
        Possible values: ResidentialDevice, Fax.

    endpointId
        Internal ID of specific residential device

    endpointName
        Residential device name or fax name