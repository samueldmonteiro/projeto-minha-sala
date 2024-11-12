

const response = (status, data = null, message, statusCode = 200, type = 'error') => {

    return {
        data,
        success: (status == true) ? true : false,
        error: (status == false) ? true : false,
        message,
        statusCode,
        type
    };
}

export default response;