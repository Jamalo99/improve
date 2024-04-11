$(document).ready(function () {
  $("#capital_id").on("change", function (event) {
    event.preventDefault();

    var capital_index = this.value;

    jQuery.ajax({
      url: "/fetch-macroprocess",
      data: {
        capital_id: capital_index,
        _token: "{{ csrf_token() }}",
      },
      type: "GET",

      success: function (result) {
        var select = $("#macroprocess_id");

        // Svuota le opzioni esistenti (opzionale)
        if (select.prop("options").length > 0) {
          select.empty();
        }

        // Create new options from the result object
        $.each(result[0], function (key, value) {
          var option = $("<option></option>");
          option.attr("value", key); // Set the option value
          option.text(value); // Set the option text

          select.append(option); // Add the option to the select element
        });
      },
      error: function (xhr, status, error) {
        // Se la richiesta fallisce...
        var errors = xhr.responseJSON.errors;

        // Mostrare i messaggi di errore
        $.each(errors, function (key, value) {
          $("#" + key + "_error").text(value[0]);
        });
      },
    });
  });

  //Save header
  $("#saveBtn").on("click", function (event) {
    var successCount = 0;

    function handleComplete() {
      successCount++;

      if (successCount === 6) {
        Swal.fire({
          position: "top-end",
          icon: "success",
          title: "Your work has been saved",
          showConfirmButton: false,
          timer: 2500,
        }).then((result) => {
          location.reload();
        });
      }
    }

    //Save simply answer
    let simplyAnswer = {};
    let textareasSimply = document.querySelectorAll("textarea.simplyAnswer");
    textareasSimply.forEach((textarea) => {
      let questionId = textarea.getAttribute("id");
      let answer = textarea.value;

      simplyAnswer[questionId] = answer;
    });

    //Save a probability and impact
    var probability = $("#probability").val();
    var impact = $("#impact").val();

    //Save or Update a header
    jQuery.ajax({
      url: headerURL,
      data:
        jQuery("#updateControlKeyHeader").serialize() + "&_token=" + crfToken,
      type: "PUT",

      success: function () {
        handleComplete();
      },
      error: function (xhr, status, error) {
        Swal.fire({
          title: "Error!",
          text: "An error occurred while updating.",
          icon: "error",
        });
      },
    });

    //Save or Update a simplyQuestions
    jQuery.ajax({
      url: simplyQuestionURL,
      data: {
        controlKey: controlKeyId,
        simplyAnswer: simplyAnswer,
        _token: crfToken,
      },
      type: "PUT",

      success: function (response) {
        handleComplete();
      },
      error: function (xhr, status, error) {
        Swal.fire({
          title: "Error!",
          text: "An error occurred while updating.",
          icon: "error",
        });
      },
    });

    //Save or Update a risk
    jQuery.ajax({
      url: riskURL,
      data: {
        probability: probability,
        impact: impact,
        _token: crfToken,
      },
      type: "PUT",

      success: function (response) {
        handleComplete();
      },
      error: function (xhr, status, error) {
        Swal.fire({
          title: "Error!",
          text: "An error occurred while updating.",
          icon: "error",
        });
      },
    });

    //Save or update activities
    var dataToSend = [];

    $("#table-body-activity tr").each(function () {
      var rowData = {};

      rowData.id = $(this).data("id");
      rowData.activityName = $(this).find("#activity-name").val();
      rowData.descActivity = $(this).find("#desc-activity").val();
      rowData.descControl = $(this).find("#desc-control").val();
      rowData.ctr = $(this).find("#ctr").val();

      dataToSend.push(rowData);
    });

    if (dataToSend.length > 0) {
      $.ajax({
        url: activityURL,
        data: {
          controlKey: controlKeyId,
          activities: dataToSend,
          _token: crfToken,
        },
        type: "PUT",
        success: function (response) {
          handleComplete();
        },
        error: function (xhr, status, error) {
          Swal.fire({
            title: "Error!",
            text: "An error occurred while updating.",
            icon: "error",
          });
        },
      });
    } else {
      handleComplete();
    }

    //Save or Update period question
    var periodQuestionToSend = {};

    $('table[name="period-question-table"]').each(function () {
      var table = $(this);
      var tableId = table.data("id");
      var rowData = {};

      table.find("tbody tr").each(function (index) {
        var row = $(this);

        if (index === 0) {
          row.find("td").each(function () {
            var cell = $(this);

            var period = cell.data("id");
            var answerData = cell.find('select[name="answer"]').val();

            rowData[period] = {
              answer: answerData,
            };
          });
        } else if (index === 1) {
          row.find("td").each(function () {
            var cell = $(this);

            var period = cell.data("id");
            var impactData = cell.find('select[name="impact"]').val();

            if (typeof impactData !== "undefined") {
              rowData[period].impact = impactData;
            }
          });
        } else {
          row.find("td").each(function () {
            var cell = $(this);

            var period = cell.data("id");
            var probabilityData = cell.find('select[name="probability"]').val();

            if (typeof probabilityData !== "undefined") {
              rowData[period].probability = probabilityData;
            }
          });
        }
      });

      periodQuestionToSend[tableId] = rowData;
    });

    $.ajax({
      url: periodQuestionURL,
      data: {
        controlKey: controlKeyId,
        periodAnswer: periodQuestionToSend,
        _token: crfToken,
      },
      type: "PUT",
      success: function (response) {
        handleComplete();
      },
      error: function (xhr, status, error) {
        Swal.fire({
          title: "Error!",
          text: "An error occurred while updating.",
          icon: "error",
        });
      },
    });

    //Save or Update Fraud question

    var fraudAnswerToSend = [];
    $('table[name="fraud-question-table"] tbody tr').each(function () {
      var rowData = {};

      var row = $(this);
      var answerId;
      row.find("td").each(function () {
        answerId = $(this).data("id");
      });
      var answer = row.find("select").val();

      rowData.answer_id = answerId;
      rowData.answer = answer;

      fraudAnswerToSend.push(rowData);
    });

    $.ajax({
      url: fraudAnswerURL,
      data: {
        controlKey: controlKeyId,
        fraudAnswer: fraudAnswerToSend,
        _token: crfToken,
      },
      type: "PUT",
      success: function (response) {
        handleComplete();
      },
      error: function (xhr, status, error) {
        Swal.fire({
          title: "Error!",
          text: "An error occurred while updating.",
          icon: "error",
        });
      },
    });
  });
});
