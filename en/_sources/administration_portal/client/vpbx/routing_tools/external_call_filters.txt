.. _external_filters:

#####################
External call filters
#####################

One of the most common task a client's administrator will do is to
configure schedules and calendars to apply to existing :ref:`ddis`.

Once we have our new created :ref:`Schedules` and :ref:`Calendars`, it's time to apply them
in what we call **External call filter**.

The client admin can configure them in the following screen:


.. glossary::

    Name
        Descriptive name that will reference this filter in DDIs configuration.

    Welcome locution
        This locution will be played if the call is not going to be
        forwarded by out of schedule or holiday filtering (in other words if
        the normal routing of the DDI is going to be applied).

    Black list
        External origin will be checked against the associated :ref:`match_lists`,
        if a coincidence is found, the call will be rejected immediately.

    White list
        External origin will be checked against the associated :ref:`match_lists`,
        if a coincidence is found, the call will be directly routed to the DDI
        destination, skipping the filter process. Take into account that black
        listed are checked before white lists.

    Holiday locution
        The locution will be  played when the day is marked as holiday in any
        of the calendars associated with the filter **if the calendar entry has
        no locution** for that day.

    Holiday forward type
        After playing the above locution (if configured), call can be forwarded
        to a voicemail, external number or internal extension. For example, the
        filter of the image will redirect calls during holidays to the external
        number 676 676 676.

    Out of schedule locution
        The locution will be played when, not being holiday, the current time
        is not in any of the time gaps defined in the schedules assigned to the
        filter.

    Out of schedule forward type
        Like in the holidays forward, but for out of schedule. The image above
        won't apply any forward (and the call will be hung up).

    Calendars
        One or more calendars can be associated with the filter. The combination
        of all the calendars will be applied.

    Schedules
        One or more schedules can be applied. The combination of all the time
        gaps defined in the schedules will be applied.


.. attention:: Holidays are processed **before** out of schedule events.

In the next section we will use this new created filter with
:ref:`ddis` so we can configure a welcome locution for normal days,
and especial behaviours for holidays and out of schedule events.
