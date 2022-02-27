const htmlCheckSchema = new mongoose.Schema({
    user_id: {
        type: String,
        required: true,
    },
    option: {
        type: String,
        required: true,
    },
    check_result: {
        type: String,
        min:20
    },
    createdAt: {
        type: Date,
        default: Date,
    },
    updatedAt: {
        type: Date,
        default: Date,
    }
});

module.exports = mongoose.model('Html_Checkes', htmlCheckSchema);